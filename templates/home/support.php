<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3 style="padding-top:20px,color:green">THANKS FOR HELPING US TO IMPROVE</h3>
			<form action="" method="POST" name="update">
				<fieldset>
					<legend>
						<h3 style="padding-top: 25px;"> Details </h3>
					</legend>
					<div class="control-group form-group">
						<div class="controls">
							<input placeholder="Full Name" type="text" class="form-control" id="gname" name="gnamex" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<input placeholder="Email ID" type="email" class="form-control" id="email" name="email" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Query : </label>
							<textarea class="form-control" rows="5" cols="40" id="queryx" name="squeryx" maxlength="200"></textarea>
							<p class="help-block"></p>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Send" name="update" class="btn btn-primary">
						<button type="reset" name="reset" class="btn btn-primary">Reset</button>
				</fieldset>
			</form>
			</div>
		</div>
		<?php include('footer.php'); ?>