        <?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style type="text/css">
	a.button {
    display: block;
    width: 115px;
    height: 40px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    line-height: 20px;
}

	
</style>
</head>
	<div class="container" style="max-width: 1200px;">

        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Enjoy
        <small>Google Play</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href=" index">Home</a>
        </li>
        <li class="active">DownLoad</li>
		</ol>
        </div>
        </div>
    
    <div class="row">
        <div class="col-md-6">
        <img class="img-responsive" src="images/SubwaySurfers.jpg" alt="">
        </div>
        <div class="col-md-6">
        <h2>Subway Surfers</h2>
        <p><strong>SYBOGAMES</strong> <strong>7+</strong></p><br>
<p>
Contains Ads Offers in-app purchases <br>
This app is available for your device.</p>
		<?php
    // Array containing sample image file names
    $images = array("rate.jpg");
    
    // Loop through array to create image gallery
    foreach($images as $image){
        echo '<div class="img-box">';
            echo '<img src="images/' . $image . '" width="350" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
            echo '<p><a href="download.php?file=' . urlencode($image) . '" class="button">Download</a></p>';
			
        echo '</div>';
		
    }
    ?>
	
     
        
        <hr>
        <?php include('footer.php'); ?>
        </body>
        </html>
