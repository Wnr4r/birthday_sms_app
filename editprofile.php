<title>Edit User Profile | My Bday App</title>
<?php include('header.php'); ?>
<div class="container">
<?php

include('db.php');
//keeps a track of the user to know if he's trying to bypass login page
$_SESSION['counter'] = 1;
if($_SESSION['status'] == "logged" )
{
		$email = $_SESSION['email'];

		$query = "SELECT * FROM user_info WHERE email='$email' "; //fetch user profile frm db
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$dob = $row['dob'];
		$tel = $row['tel_no'];
		$sender_name = $row['sender_name'];
		$message = $row['message'];
		$id = $row['id'];
		
	echo '<form action="editprofile.php" method="POST">
<p>First Name:<br/> 
      <input name="fname" type="text" value="'.$fname.'" size="30">
  </p>
    <p>Last Name: <br/><input type="text" name="lname" size="30" value="'.$lname.'"/></p>
    <p>Date of Birth:<br/> <input type="text" name="dob" value="'.$dob.'" size="30" /></p>
  	<p>Telephone Number:<br/> <input type="tel" name="phone" value="'.$tel.'" size="30" /></p>
	<p>Birthday Message to send:<br/><em> (this message will be sent to user on Birthday)</em><br/> <textarea maxlength="160" rows="4" cols="50" name="message" placeholder="enter your message here">'.$message.'</textarea></p>
	<p>SMS Sender Name:<br/><em> (this name is used as the sender name on SMS sent)</em><br/> <input type="text" name="sender_name" value="'.$sender_name.'" size="30" /></p>
    <input type="submit" name="submit" class="btn btn-primary" value="Update Profile"> <input type="hidden" name="id" value="'.$id.'">
</form>';
	
//checks to see if the form has been submitted		
	if (isset($_POST['id']) && is_numeric($_POST['id']))
	{
	$fname = mysql_real_escape_string(trim (strip_tags($_POST['fname'])));
	$lname = mysql_real_escape_string(trim (strip_tags($_POST['lname'])));
	$dob = mysql_real_escape_string(trim (strip_tags($_POST['dob'])));
	$tel = mysql_real_escape_string(trim (strip_tags($_POST['phone'])));
	$id = mysql_real_escape_string(trim (strip_tags($_POST['id'])));
	$sender_name = mysql_real_escape_string(trim (strip_tags($_POST['sender_name'])));
$message = mysql_real_escape_string(trim (strip_tags($_POST['message'])));
	
	//update the db
	$query = "UPDATE user_info SET firstname='$fname', lastname='$lname', dob='$dob', tel_no='$tel', sender_name='$sender_name', message='$message' WHERE email='$email'";
		if (mysql_query($query))
		{
		echo '<div class="alert alert-success" align="center"> <strong>Your profile was updated successfully, <a href="dashboard.php">click here to return to dashboard</a>		</strong></div>';
		}
		else
		{
		echo '<div class="alert alert-danger">there was an error while updating the info please contact Syntocode</div>';
		}
	}

	
}
else
{
//if not logged
header ('Location: login.php');
}

?>
</div>
<?php include('footer.php'); ?>