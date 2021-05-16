<?php 
require_once ('dbhelper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#timkiem').keyup(function(){
        var key = $('#timkiem').val();
        $.get('tim-kiem.php', {data: key}, function(data){
            $('.result').html(data);
        });
		
    })
})
</script>
</head>
<body>
<div class="container">
	<div class="panel panel-primary">
    <div class="panel-heading">
    <form method="get">
				<div class="form-group">
					<input type="text" id="timkiem" name="search" class="form-control" style="margin-top: 10px; margin-bottom: 10px;" placeholder="Tim Kiem">
				</div>
				<button class="btn btn-success">Search</button>
                <div class="result"></div>
			</form>
    </div>
	<div class="panel-body">
	
	</body>	
	</div>
	</div>
</body>
</html>