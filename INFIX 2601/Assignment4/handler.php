<?php
	$doProcess =0;
	if(isset($_POST['submitFile']))
	{
		if ($_FILES['fileName']['type'] == 'text/plain') 
		{   
			if(filesize($_FILES['fileName']['name']) ==0)
			{
				echo "<p>File is empty</p>";
			}
			else
			{
				echo "<p>File upload successful</p>";
				$doProcess =1;
			}
		} 
		else 
		{
			echo "<p>File could not be uploaded because it is not a text file</p>";
		}
    }
?>