<?php
	$radioErr = $mvpErr = $favErr = $divErr = $footErr = $emailErr ='';
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$formVal=true;
		//Radio handle
		if (empty($_POST['radio'])) 
		{
			$radioErr='Required';
			$formVal=false;
		}
		//Checkbox handler
		if (empty($_POST['mvps'])) 
		{
			$mvpErr='Required';
			$formVal=false;
		}
		//if a box is checked look to see if at least 2 are checked, otherwise it prints the checkbox results
		else
		{
			$numItems= count($_POST['mvps']);
			if ($numItems < 2)
			{
				$mvpErr='Select at least 2 players';
				$formVal=false;
			}
		}
		//text box handler
		if (empty($_POST['playername'])) 
		{
			$favErr='Required';
			$formVal=false;
		}
		//checks to see if there is an attempt to inject code to the site (limits the user to a-z, A-Z and 0-9)
		else if(!preg_match("/^[a-zA-Z0-9 ]*$/",$_POST['playername']))
		{
			$favErr='CODE INJECTION DETECTED';
			$formVal=false;
		}
		//drop down selector manager
		if (empty($_POST['best_div'])) 
		{
			$divErr='Required';
			$formVal=false;
		}
		//textbox handler
		if (empty($_POST['footInfo'])) 
		{
			$footErr='Required';
			$formVal=false;
		}
		else if(substr_count($_POST['footInfo'], 'validate')<1 and substr_count($_POST['footInfo'], 'Validate')<1 )
		{
			$footErr='The word validate is not present';
			$formVal=false;
		}
		//checks to see if there is an attempt to inject code to the site (limits the user to a-z, A-Z, 0-9, !, ., ?, & and ,)
		else if(!preg_match("/^[a-zA-Z0-9.!?&, ]*$/",$_POST['footInfo']))
		{
			$footErr='CODE INJECTION DETECTED';
			$formVal=false;
		}
		if(!filter_var($_POST['email_name'], FILTER_VALIDATE_EMAIL))
		{
			$emailErr='ENTER A VALID EMAIL';
			if(!empty($_POST['mail']))
			{
				$formVal=false;
				$emailErr='CANNOT SEND EMAIL WITHOUT A VALID EMAIL ADDRESS';
			}
		}
	}
?>