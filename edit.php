<title>Edit User Info | My Bday App</title>
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
	echo '<form action="edit.php" method="POST">
<p>First Name:<br/> 
      <input name="fname" type="text" value="'.$fname.'" size="30">
  </p>
    <p>Last Name: <br/><input type="text" name="lname" size="30" value="'.$lname.'"/></p>
    <p>Date of Birth:<br/> <input type="text" name="dob" value="'.$dob.'" size="30" /></p>
  	<p>Telephone Number:<br/> <input type="tel" name="phone" value="'.$tel.'" size="30" /></p>
    <input type="submit" name="submit" class="btn btn-primary" value="Update this Entry"> <input type="hidden" name="id" value="'.$id.'">
</form>';
	}
		
elseif (isset($_POST['id']) && is_numeric($_POST['id']))
	{
	$fname = mysql_real_escape_string(trim (strip_tags($_POST['fname'])));
	$lname = mysql_real_escape_string(trim (strip_tags($_POST['lname'])));
	$dob = mysql_real_escape_string(trim (strip_tags($_POST['dob'])));
	$tel = mysql_real_escape_string(trim (strip_tags($_POST['phone'])));
	$id = mysql_real_escape_string(trim (strip_tags($_POST['id'])));
	
	//update the db
	$query = "UPDATE bday_info SET firstname='$fname', lastname='$lname', dob='$dob', tel_no='$tel' WHERE id='$id'";
	if (mysql_query($query))
		{
		echo '<div class="alert alert-success" align="center">
  <strong>The Info has been updated successfully, <a href="dashboard.php">click here to return to dashboard</a></strong></div>';
		}
		else
		{
		echo '<div class="alert alert-danger">there was an error while updating the info please contact Syntocode</div>';
		}
	}
else
	{
	echo '<div class="alert alert-danger">There was an error processing your request</div>';
	}

?>
</div>
<?php include('footer.php'); ?>