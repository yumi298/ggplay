<?php
    session_start();
    
    require_once('../db.php');
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Register </title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<?php
    $error = '';
    $full_name = '';
    $user_name = '';
    $birthday = '';
    $gender = '';
    $email = '';
    $role = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['full_name']) && isset($_POST['user_name']) && isset($_POST['email'])
    && isset($_POST['birthday']) && isset($_POST['gender']) && isset($_POST['role'])
    && isset($_POST['role']) && isset($_POST['pass']) && isset($_POST['conf-pass']))
    {
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['conf-pass']; 
        

        if (empty($full_name)) {
            $error = 'Please enter your full name';
        }
        else if (empty($user_name)) {
            $error = 'Please enter your user name';
        }
        else if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else if (empty($birthday)) {
            $error = 'Please enter your birthday';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Password does not match';
        }
        else {
            //success
            $result = register($email, $user_name, $pass, $full_name, $gender, $birthday, $role);
            if($result['code']==0){
                
				header('location:../login/login.php');
				echo '<script>alert("Create account successfully!")</script>';
            }else if ($result['code']==1){
                $error = 'This email is already exists';
            }else{
                $error = 'Error occured. Try again';
            }
        }
    }
?>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form action="" method="post" novalidate>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full name</label>
                                    <input value="<?= $full_name?>" class="input--style-4" type="text" name="full_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User name</label>
                                    <input value="<?= $user_name?>" class="input--style-4" type="text" name="user_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input value="<?= $birthday?>" class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input value="Nam" type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input value="Nữ" type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-email">
                            <div>
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input value="<?= $email?>" class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input value="<?= $pass?>" class="input--style-4" type="password" name="pass">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm password</label>
                                    <input value="<?= $gender?>" class="input--style-4" type="password" name="conf-pass">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Role</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select value="<?= $role?>" name="role">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Admin</option>
                                    <option>Dev</option>
                                    <option>User</option>
                                </select>
                                <div class="select-dropdown"></div><br><br>
                                <div class="alertreg">
                                    <?php
                                        if (!empty($error)) {
                                          echo "<div class='alert-register'>$error</div>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                        
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->