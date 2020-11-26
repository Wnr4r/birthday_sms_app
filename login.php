    <title>Login Page | My Bday App</title>


<?php include('header.php'); ?>
<div class="container">
<?php 

//I need to check if the user is already logged 
If($_SESSION['status'] == "logged" ) 
	{ header('location: dashboard.php');} 

	//Confirmed wether user tried to bypass login page

elseif ($_SESSION['counter'] == 1 )
	{$attemptError= "You must login to view that page";}
		//form validation
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if (!empty($_POST['email']) && !empty($_POST['pass']))
					{
						$email = $_POST['email'];
						$pass = $_POST['pass'];
						$pass = md5($pass);
						//db login details
						include('db.php');

						//process login query
						$query = "SELECT * FROM user_info WHERE email='$email' && pass='$pass'";
						$result = mysql_query($query);
						$check = mysql_num_rows($result);
//want to get the firstname of the user and store in session, to be used for greeting
$row = mysql_fetch_array($result);
$fname = $row['firstname'];
							if ($check >= 1)
								{
									//create a session
									$_SESSION['status'] = "logged";
									$_SESSION['email'] = $email;
$_SESSION['username'] = $fname;
									header ('location: dashboard.php');
								}
							else
								{
								
									echo '<div class="alert alert-danger">you are an intruder </div>';
								}
					}
					else 
					{ echo '<div class="alert alert-danger">You must enter a valid email and pass</div>';	}
}


?>

<div class="alert alert-danger"><?php if($attemptError){echo "$attemptError";} ?></div>
<form action="login.php" method="POST">
    <p>Email Address:<br/> <input type="text" name="email" size="30" /></p>
    <p>Password:<br/> <input type="password" name="pass" size="30" /></p>
    <input type="submit" name="submit" class="btn btn-primary" value="Login"> |  <input type="reset" name="reset" class="btn btn-primary" value="Clear">
</form>
</div>
<?php include('footer.php'); ?>