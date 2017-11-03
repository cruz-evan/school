<div class="panel-body">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES); ?>" method="post">
		<div class="form-group">
			<input type="text" id="user" name="userReg" placeholder="Username" maxlength='25' required="required">
		</div>
		<div class="form-group">
			<input type="password" id="pass" name="passReg" placeholder="Password" maxlength='25' required="required">
		</div>
		<div class="form-group">
			<input type="email" id="email" name="emailReg" placeholder="Email" maxlength='40' required="required">
		</div>
		<div class="form-group">
			<input type="text" id="address" name="addressReg" placeholder="Address" maxlength='40' required="required">
		</div>
		<input type="submit" value="Submit" name="Reg" class="btn btn-success">
	</form>
</div>