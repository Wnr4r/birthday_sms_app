<html>
<head>
    <title>Login Page | My Bday App</title>

</head>
<body>
<?php 
session_start();

include('header.php');
//db login details
include('db.php');
//Confirmed wether user tried to bypass login page
if ($_SESSION['counter'] == 1 )
{$attemptError= "You must login to view that page";}
//form validation
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (!empty($_POST['email']) && !empty($_POST['pass']))
	{
		$email = mysql_real_escape_string(trim(strip_tags($_POST['email'])));
		$pass = $_POST['pass'];
		$pass = md5($pass);
	

	//process login query
	$query = "SELECT * FROM user_info WHERE email='$email' && pass='$pass'";
	$result = mysql_query($query);
	$check = mysql_num_rows($result);
		if ($check >= 1)
		{
			//create a session
			$_SESSION['status'] = "logged";
			$_SESSION['email'] = $email;
			echo "Login Ok <br/> $check";
			header ('location: dashboard.php');
		}
		else
		{
			echo "\n you are an intruder<br/>";
		}
	}
	else 
	{ echo "You must enter a valid email and pass";
		
	}
}
/** NOT WORKING YET
 elseif ($_SESSION['status'] == "logged")
{ 
header('dashboard.php');
}
**/


?>
<?php if($attemptError){echo "$attemptError";} ?>
<form action="login.php" method="POST">
    <p>Email Address: <input type="text" name="email" size="20" /></p>
    <p>Password: <input type="password" name="pass" size="20" /></p>
    <input type="submit" name="submit" value="Login"> | <input type="reset" name="reset" value="Reset Form">
</form>
</body>
</html>