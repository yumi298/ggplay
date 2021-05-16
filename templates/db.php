<?php   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once 'vendor/autoload.php';

    define('HOST','127.0.0.1');
    define('USER','root');
    define('pass','');
    define('DB','ggplay'); 
    
    function open_database(){
        $conn = new mysqli(HOST,USER,pass,DB);
        if($conn->connect_error){
            die('Connect error: '. $conn->connect_error);
        }
        $conn->set_charset('utf8');
        return $conn;
    }

    function login($email, $password){
        $sql = "select * from account where email = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $email);
        $stm->execute();

        $result = $stm->get_result();

        $data = $result->fetch_assoc();
        $hashed_password = $data['password'];
        if (!password_verify($password, $hashed_password)){
            return array('code'=>2, 'error'=>'Invalid password');
        }
        else if ($data['activated'] === 0) {
            return array('code' => 3, 'error' => 'This account is not activated');
        }
        else if($data['account_type'] == 'Admin'){
            return array('code'=>5, 'error'=> '', 'data'=>$data);
        }
        else if($data['account_type'] == 'Dev') {
            return array('code' => 7, 'error' => '', 'data' => $data);
        }
        else
            return array('code'=>0, 'error'=> '', 'data'=>$data);
    }
	
	
    function is_email_exits($email){
        $sql = 'select user from account where email = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$email);
        if (!$stm->execute()){
            die('Query error: '.$stm->error);
        }
        $result = $stm->get_result();
        if ($result->num_rows > 0){
            return true;//co email
        }else{
            return false;
        }
    }

    function register($email, $user_name, $password, $full_name, $gender, $birthday, $role){

        if (is_email_exits($email)){
            return array('code' => 1, 'error' => 'Email exists');
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $rand = random_int(0,1000);
        $token = md5($email .'+'. $rand);

        $sql = 'insert into account(email, user, password,name, gender, dateofbirth, account_type, activate_token) values(?,?,?,?,?,?,?,?)';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssssss', $email, $user_name, $hash, $full_name, $gender, $birthday, $role, $token);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Can not execute command');
        }
        
        sendActivationEmail($email, $token);
        return array('code' => 0, 'error' => 'Create account successful');
    }
    
    function sendActivationEmail($email, $token){
		$mail = new PHPMailer(true);
        try {
            //T
            $mail->isSMTP();                                            // Send using SMTP
            $mail->CharSet = 'UTF-8';
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'admin@gmail.com';                     // SMTP username
            $mail->Password   = '123456';                               // SMTP password
            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('admin@gmail.com', 'VERIFY ACCOUNT');
            $mail->addAddress($email,'Receiver');   

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Verify your Klassroom account';
            $mail->Body    = "Click <a href='http://localhost:8888/account/activate.php?email=$email&token=$token'>here</a> to verify";
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

	function sendResetEmail($email, $token){
		$mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
			$mail->CharSet='UTF-8';
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'admin@gmail.com';                     // SMTP username
            $mail->Password   = '123465';                               // SMTP password
            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('admin@gmail.com', 'RECOVER PASSWORD');
            $mail->addAddress($email,'Receiver');     // Add a recipient
            /*$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset password';
            $mail->Body    = "Click <a href='http://localhost:8888/account/reset_password.php?email=$email&token=$token'>here</a> to reset";
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function activeAccount($email, $token){
        $sql = 'select user from account where email = ? and activate_token = ? and activated = 0';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$email,$token);

        if (!$stm->execute()){
            return array('code' => 1,'error'=>'Can not execute command');
        }
        $result = $stm->get_result();
        if($result->num_rows == 0){
            return array('code'=> 2,'error'=>'Email address or token not found');
        }
        //if found
        $sql = "update account set activated = 1 where email = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$email);
        if(!$stm->execute()){
            return array('code'=> 1,'error'=>'Can not execute command');
        }

        return array('code' => 0, 'message'=>'Account activated');
    }

    function reset_password($email){
        if(!is_email_exits($email)){
            return array('code'=>1,'error'=>'Email does not exists');
        }
		$token=md5($email.'+'.random_int(1000,2000));
		$sql='update reset_token set token = ? where email = ?';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$email,$token);

        if (!$stm->execute()){
            return array('code'=>2,'error'=>'Can not execute');
        }
		if($stm->affected_rows==0){
			$exp=time()+3600*24;
			$sql='insert into reset_token values(?,?,?)';
			$stm=$conn->prepare($sql);
			$stm->bind_param('ssi',$email,$token,$exp);			
			if (!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute');
			}
		}
		$success = sendResetEmail($email,$token);
		return array('code'=>0,'success'=>$success);
	}
	
	function save_pass($email, $pass){
		$sql = 'update account set password = ? where email = ?';
		$hash = password_hash($pass, PASSWORD_DEFAULT);
		$conn = open_database();
		$stm = $conn->prepare($sql);
		
		$stm->bind_param('ss',$hash, $email);
		
		if(!$stm->execute()){
			return array('code'=>1, 'error'=>'Can not execute command');
		}
		return array('code'=>0,'message'=>'Change password success');
	}
?>