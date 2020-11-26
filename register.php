    <title>New User Registration | My Bday App</title>

<?php
session_start();
session_destroy();
include('header.php');
?>
<body>
<div class="container">
<?php


include('db.php');

if ($_SERVER['REQUEST_METHOD']== 'POST') //handle form
{
   if (!empty($_POST['email']) && !empty($_POST['pass'])&& !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['dob']) && !empty($_POST['phone']))
   {

	
	$fname =  mysql_real_escape_string(trim (strip_tags($_POST['fname'])));
    	$lname = mysql_real_escape_string(trim (strip_tags($_POST['lname'])));
    	$email = mysql_real_escape_string(trim (strip_tags($_POST['email'])));
    	$dob = mysql_real_escape_string(trim (strip_tags($_POST['dob'])));
    	$tel = mysql_real_escape_string(trim (strip_tags($_POST['phone'])));
	$pass = md5($_POST['pass']);

	
	//check if email exist in DB

    	$query = "SELECT * FROM user_info WHERE email='$email'";
	$result = mysql_query ($query);
    	$check = mysql_num_rows($result);

	if ($check >= 1)
    	{
        	echo '<div class="alert alert-danger">The email already exists</div>';

    	}
        else
        {

    		$query = "INSERT INTO user_info (id, firstname, lastname, email, pass, dob, tel_no, sender_name) VALUES (0, '$fname', '$lname', '$email', '$pass', '$dob', '$tel', '$fname') ";
    		if  (mysql_query($query))
    		{
       			echo '<div class="alert alert-success">
  <strong>Your new account has been registered, Please <a href="login.php">login to continue</a></strong></div>';
  			
			$headers = "From: syntocode@syntocode.com";
  			$msg = "A user with email: $email has just registered on your app";
  			$msg2 = "Thank You for registering on Syntocode's Birthday app, Kindly know that this app is in testing/development stage.\nKindly contact me on 08063124218 if you have any issue using this app or have feature suggestions\nThanks once again\n\nSyntocode Tomisin";
			$msg2 = wordwrap($msg2,70);
  			mail('syntocode@syntocode.com','New User Registered',$msg);
  			mail($email,'Registration Successful',$msg2,$headers);	   
	   	}

       		else 
       		{
	   	   echo  '<div class="alert alert-danger">error could not complete dbase operation contact syntocode</div>';
	   	}
	  }

     }
     else
     {
     	   	$validationError = " <div class=\"bg-danger\"> You Must fill All fields </div>";
     }
}
	?>
	
<div class="alert alert-success">
  <strong>To Register as a new user please fill in your details</strong></div>
<form action="register.php" method="POST">
 <?php if (!empty($validationError)) {echo "<div class=\"alert alert-danger\">$validationError</div>";} ?>
  <p>First Name:<br/> 
      <input name="fname" type="text" value="" size="30">
  </p>
    <p>Last Name:<br/> <input type="text" name="lname" size="30" /></p>
    <p>Email Address:<br/> <input type="text" name="email" size="30" /></p>
    <p>Password:<br/> <input type="password" name="pass" size="30" /></p>
  <p>Date of Birth: (e.g 27/11/2015)<br/> <input type="text" name="dob" placeholder="Date/Month/Year" size="30" /></p>
  <p>Telephone Number:<br/> <input type="tel" name="phone" size="30" /></p>
    <input type="submit" name="submit" class="btn btn-primary" value="Register Profile"> | <input type="reset" class="btn btn-primary" name="reset" value="Reset Form">
</form>
</div>
</body>
</html>