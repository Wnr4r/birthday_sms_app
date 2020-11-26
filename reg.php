    <title>New Bday Registration | My Bday App</title>
<?php include('header.php'); ?>
<body>
<div class="container">
<?php
include('db.php');
//keeps a track of the user to know if he's trying to bypass login page
$_SESSION['counter'] = 1;
//check login status
if ($_SESSION['status'] == "logged")
{
	if ($_SERVER['REQUEST_METHOD']== 'POST') //handle form
	{
		   if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['dob']) && !empty($_POST['phone']))
		   {
    			$fname =  mysql_real_escape_string(trim (strip_tags($_POST['fname'])));
    			$lname = mysql_real_escape_string(trim (strip_tags($_POST['lname'])));
    			$email = $_SESSION['email'];
    			$dob = mysql_real_escape_string(trim (strip_tags($_POST['dob'])));
    			$tel = mysql_real_escape_string(trim (strip_tags($_POST['phone'])));
			$query = "INSERT INTO bday_info (id, firstname, lastname, email, dob, tel_no) VALUES (0, '$fname', '$lname', '$email', '$dob', '$tel' ) ";
    				if  (mysql_query($query))
				{
       					echo '<div class="alert alert-success">
  <strong>Your new entry was successful entered</strong></div>';
	   
	   			}

       				else 
				{
	   	   	
	   				echo  '<div class="alert alert-danger">An error occurred pls contact Syntocode </div>';
	   			}
			}
			else
     			{
     	   			$validationError = " You Must fill All fields";
     			}
	}
}
else
{
header('location: login.php');
// to monitor attempt without login $_SESSION['attempt'] = 1;
}

?>
	

<form action="reg.php" method="POST">
<div class="alert alert-danger"> <?php if ($validationError) {echo "$validationError";} ?> </div>
  <p>First Name:<br/> 
      <input name="fname" type="text" value="" size="20">
  </p>
    <p>Last Name:<br/><input type="text" name="lname" size="20" /></p>
    <p>Date of Birth:<br/> <input type="text" name="dob" placeholder="Date/Month/Year" size="20" /></p>
  	<p>Telephone Number:<br/> <input type="tel" name="phone" size="20" /></p>
    <input type="submit" class="btn btn-primary" name="submit" value="Register Profile"> | <input type="reset" name="reset" class="btn btn-primary" value="Reset Form">
</form>
</div>
<?php include('footer.php'); ?>