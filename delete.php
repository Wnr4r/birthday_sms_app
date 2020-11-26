
<title>Delete User Info | My Bday App</title>
<?php include('header.php'); ?>
<div class="container">
<?php

include('db.php');
if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM bday_info WHERE id='$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$dob = $row['dob'];
		$tel = $row['tel_no'];
	
	echo '<form action="delete.php" method="POST">
<div class="alert alert-danger"><p><h4>Are you sure you want to remove <b>'.$fname.' '.$lname.' </b> from the your birthday list?</h4></p></div>
    <input type="submit" class="btn btn-primary" name="submit" value="Delete this User"> <input type="hidden" name="id" value="'.$id.'">
</form>';
	}
elseif (isset($_POST['id']) && is_numeric($_POST['id']))
	{
	$id = mysql_real_escape_string(trim (strip_tags($_POST['id'])));
	
	//Delete the entry
	$query = "DELETE FROM bday_info WHERE id='$id'";
	if (mysql_query($query))
		{
		echo '<div class="alert alert-success" align="center">
  <strong> The User has been deleted successfully, <a href="dashboard.php">click here to return to dashboard</a></strong></div>';
		}
		else
		{
		die(mysql_error()); //troubleshoot sql error
		echo 'there was an error while deleting the info please contact Syntocode';
		}
	}
else
	{
	echo 'There was an error processing your request';
	}


?>
</div>