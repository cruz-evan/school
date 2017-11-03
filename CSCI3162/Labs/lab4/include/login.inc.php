<div class="panel-body">
	<form "<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="get">
		<div class="form-group">
			<input type="text" id="user" name="userLog" placeholder="Username" >
		</div>
		<div class="form-group">
			<input type="password" id="pass" name="passLog" placeholder="Password">
		</div>
			<input type="submit" value="Submit" name="Log" class="btn btn-success">
		</form>
</div>