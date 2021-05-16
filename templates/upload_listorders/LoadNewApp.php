<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Load New Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    .container{
        max-width: 600px;
    }
</style>
<?php
	require "connect.php";
	$category = mysqli_query($conn, "Select * from category");
	if(isset($_POST['appname'])){
		$appname = $_POST['appname'];
		$shortDes = $_POST['shortDes'];
		$longDes = $_POST['longDes'];
		$id_cate = $_POST['id_cate'];
		$fee = $_POST['fee'];
		$fee_or_not = $_POST['fee_or_not'];
		$status = $_POST['status'];
		
		if(isset($_FILES['image'])){
			$img = $_FILES['image'];
			$img_name = $img;
			move_uploaded_file($img['tmp_name'],"uploads/".$img_name);
		}
		if($status == 1){
			$status = "Draft";
		} else{
			$status = "Pending";
		}
		if(isset($_FILES['file'])){
			if($_FILES['file']['size'] <= 500000){
				$file = $_FILES['file'];
				$file_name = $file;
				move_uploaded_file($file['tmp_name'],"uploads/".$file_name);
				if($fee_or_not == 1){
					$fee = 0;
				}
				$sql = "INSERT INTO application(name_app,short_desc,long_desc,id_cate,icon,pictures,free_or_not,fee,file,status) 
				VALUES ('$appname','$shortDes','$longDes','$id_cate','$img_name','$img_name','$fee_or_not','$fee','$file_name','$status')";
				
				$result = mysqli_query($conn, $sql);
				echo '<script language="javascript">';
				echo 'alert("Bạn đã tạo ứng dụng thành công!")';
				echo '</script>';
				header("Refresh:0");
				//header("location: listApp.php"); /*Chuyển tới trang quản lý ứng dụng*/
				
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Dung lượng file quá lớn")';
				echo '</script>';
				header("Refresh:0");
			}
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel=title">Load New Application</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="appname">Name:</label>
							<input type="text" class="form-control" id="input" placeholder="Enter name of application" name="appname" required="required">
						</div>
						<div class="form-group">
							<label>Icon:</label>
							<input type="file" class="form-control" id="input" placeholder="Select picture of icon" name="image">
						</div>
						<div class="form-group">
							<label for="shortDes">Short Description:</label>
							<textarea type="text" name="shortDes" id="input" class="form-control" rows="3" required="required" maxlength="100"></textarea>
						</div>
						<div class="form-group">
							<label for="longDes">Long Description:</label>
							<textarea type="text" name="longDes" id="input" class="form-control" rows="5" maxlength="10000"></textarea>
						</div>
						<div class="form-group">
							<label>Pictures:</label>
							<input type="file" multiple="true" class="form-control" id="input" name="image">
						</div>
						<div class="form-group">
							<label for="category">Category:</label>
							<select name="id_cate" id="input" class="form-control" required="required">
								<option>_Choose a category_</option>
								<?php foreach($category as $key => $value) { ?>
									<option value="<?php echo $value['id_category']?>">
										<?php echo $value['name_cate']?>
									</option>
								<?php } ?>
							</select>
						</div class="form-group">
							<label> Free or not?</label>
							<div class="radio">
								<label>
									<input type="radio" name="fee_or_not" id="input" value="1" checked="checked">
									Yes
								</label>
								<br>
								<label>
									<input type="radio" name="fee_or_not" id="input" value="0">
									No
								</label>
								<input type="text" class="form-control" id="input" placeholder="Application's fee" name="fee">
							</div>
						<div class="form-group">
							<label>Upload File:</label>
							<input type="file" class="form-control" id="input" name="file" required="required">
						</div>
						<div class="form-group">
							<label>Save as draft?</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" checked="checked">
									Yes
								</label>
								<br>
								<label>
									<input type="radio" name="status" id="input" value="0">
									No
								</label>
							</div>
						</div>
						<button class="btn btn-success px-5 mr-1" type="submit" class="btn btn-default" name="submit">Add </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<br><br><br>
</html>
<?php include('footer.php'); ?>
