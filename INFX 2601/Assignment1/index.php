<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Assignment 1 - Forms with PHP">

			<title>Assignment 1</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/custom.css">
			
    </head>
    <body>
	<?php require_once('handler.php'); ?>
	<?php
		if($formVal==true)
		{
			echo '<div id="lowwrap">';
			include('result.php');
			echo '</div>';
		}
	?>
	   <div id="wrap">
		<h1>Football Survey</h1>
			<div id="inner-wrap">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<h4>Which team do you believe will win the Super Bowl?</h4>
					<div class="forms <?php 
										if($radioErr!='')
										{
											echo ' borderErr ';
										}
										?>" 
					>
						<input type="radio" name="radio" value="Indianapolis Colts" <?php if($_POST['radio'] == 'Indianapolis Colts' ){ echo 'checked';} ?>>Indianapolis Colts
						<input type="radio" name="radio" value="New England Patriots" <?php if($_POST['radio'] == 'New England Patriots' ){ echo 'checked';} ?>>New England Patriots
						<input type="radio" name="radio" value="Green Bay Packers" <?php if($_POST['radio'] == 'Green Bay Packers' ){ echo 'checked';} ?>>Green Bay Packers
						<input type="radio" name="radio" value="Seattle Seahawks" <?php if($_POST['radio'] == 'Seattle Seahawks' ){ echo 'checked';} ?>>Seattle Seahawks
						<p class="errorMsg"><?php echo $radioErr; ?></p>
					</div>
					<div class="forms <?php 
										if($mvpErr!='')
										{
											echo ' borderErr ';
										}
										?>" 
					>
						<h4>Which potential league MVPs would you want on your team?</h4>
						<h5>Pick at least 2</h5>
						<input type="checkbox" name="mvps[]" value="Aaron Rodgers" <?php foreach ($_POST['mvps'] as $mvp ){ if($mvp == 'Aaron Rodgers' ){ echo 'checked';} } ?>>Aaron Rodgers<br/>
						<input type="checkbox" name="mvps[]" value="JJ Watt" <?php foreach ($_POST['mvps'] as $mvp ){ if($mvp == 'JJ Watt' ){ echo 'checked';} } ?>>JJ Watt<br/>
						<input type="checkbox" name="mvps[]" value="Peyton Manning" <?php foreach ($_POST['mvps'] as $mvp ){ if($mvp == 'Peyton Manning' ){ echo 'checked';} } ?>>Peyton Manning<br/>
						<input type="checkbox" name="mvps[]" value="Tom Brady" <?php foreach ($_POST['mvps'] as $mvp ){ if($mvp == 'Tom Brady' ){ echo 'checked';} } ?>>Tom Brady<br/>
						<input type="checkbox" name="mvps[]" value="DeMarco Murray" <?php foreach ($_POST['mvps'] as $mvp ){ if($mvp == 'DeMarco Murray' ){ echo 'checked';} } ?>>DeMarco Murray<br/>
						<p class="errorMsg"><?php echo $mvpErr; ?></p>
					</div>
					<div class="forms <?php 
										if($favErr!='')
										{
											echo ' borderErr ';
										}
										?>" 
					>
						<h4>Favourite NFL player?</h4>
						<input type="text" id="playername" name="playername" placeholder="Enter your favourite NFL player" value = "<?php if(isset($_POST['playername'])){ echo $_POST['playername']; }?>">
						<p class="errorMsg"><?php echo $favErr; ?></p>
					</div>
					<div class="forms <?php 
										if($divErr!='')
										{
											echo ' borderErr ';
										}
										?>" 
					>
						<h4>Which division is the best in the league?</h4>
						<select name="best_div" id="best_div">
							<?php echo $_POST['best_div']; ?>
							<option value='' <?php if(!isset($_POST['best_div'])){echo "selected";}?>>Select One</option>
							<option value='NFC North' <?php if($_POST['best_div'] == 'NFC North'){echo "selected"; }?>>NFC North</option>
							<option value='NFC East' <?php if($_POST['best_div'] == 'NFC East'){echo "selected"; } ?>>NFC East</option>	
							<option value='NFC South' <?php if($_POST['best_div'] == 'NFC South'){echo "selected"; } ?>>NFC South</option>
							<option value='NFC West' <?php if($_POST['best_div'] == 'NFC West'){echo "selected"; } ?>>NFC West</option>
							<option value='AFC North' <?php if($_POST['best_div'] == 'AFC North'){echo "selected"; } ?>>AFC North</option>
							<option value='AFC East' <?php if($_POST['best_div'] == 'AFC East'){echo "selected"; } ?>>AFC East</option>	
							<option value='AFC South' <?php if($_POST['best_div'] == 'AFC South'){echo "selected"; } ?>>AFC South</option>
							<option value='AFC West' <?php if($_POST['best_div'] == 'AFC West'){echo "selected"; } ?>>AFC West</option>
						</select>
						<p class="errorMsg"><?php echo $divErr; ?></p>
					</div>
					<div class="forms <?php 
										if($footErr!='')
										{
											echo ' borderErr ';
										}
										?>" 
					>
						<h4>How did you get into football?</h4>
						<h6>The word validate must be present to be submitted</h6>
						<textarea name='footInfo' rows="3" cols="50"><?php if(isset($_POST['footInfo'])){ echo $_POST['footInfo']; } ?></textarea>
						<p class="errorMsg"><?php echo $footErr; ?></p>
					</div>
					<div class="forms">
						<h4>Email the form</h4>
						<input type="text" name="email_name" placeholder="Enter email address" value=<?php if(isset($_POST['email_name'])){ echo $_POST['email_name']; } ?>>
						<input type="checkbox" name="mail" <?php if(!empty($_POST['mail'])){ echo 'checked'; } ?>>Send Email</label>
						<p class="errorMsg"><?php echo $emailErr; ?></p>
					</div>
					<input type="submit" value="Submit">
				</form>	
			</div>
		   </div>
    </body>
</html>

