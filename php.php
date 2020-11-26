<!DOCTYPE html>
<html lang="en">
  <head>
  <title>BulkSMS App</title>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/syntoJMobile.css" />
  <link rel="stylesheet" href="css/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
</head>

<?php
session_start();
/**
 * Created by syntocode.
 * User: Geek
 * Date: 3/25/15
 * Time: 8:47 AM
 */
 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
if (!isset($_POST['subacctname']))
{
	$subacct = "SYNTO";	
	}
else
{
     $subacct = $_POST['subacctname'];
        }
    
       function get_url($request_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,
            $request_url);
        curl_setopt($ch,
            CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch,
            CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
   // This sends a GET request. You can then use:
$request_url = 'http://www.smslive247.com/http/index.aspx?cmd=login&owneremail='.$email.'&subacct='.$subacct.'&subacctpwd='.$pass;

$response = get_url($request_url);
$_SESSION['sessionid'] = $response;
if (strpos($response,'OK') !== false) { //checks if the sessionid returned contains OK
    header('Location: smspage.php');
}
else{
$errormsg = " <div class=\"bg-danger\">login is invalid please try again :(</div>";
}


}
?>
<body>
<div data-role="page">
  <div data-role="header">
  <div align="center" class="menu"> <a href="http://syntocode.com/app" class="ui-btn">Home</a> | <a href="http://syntocode.com/contact" class="ui-btn">Contact Me</a></div>
<h2>Login: My BulkSMS App 4 Smslive247.com</h2>
<div style="margin-left: 100px;"><?php if($errormsg){ echo $errormsg;} ?></div>
</div>
<div data-role="main" class="ui-content">
<form action="index.php" method="post" data-ajax="false">
<label>Account Email: </label>
<input type="text" name="email" size='30' placeholder="Enter your email" id="email"><br>
     <label>Subacct Name: </label>
<input type="text" name="subacctname" size='30' placeholder="Enter your subacct name">


      <br>
     	  <label>Subacct Password: </label>
      <input type="password" name="pass" size='30' placeholder="Enter your subacct password" id="pass">
      <br><br>
<input type="submit" name="submit" class="btn btn-success" id="submit" value="Login"> <input type="reset"  class="btn btn-warning" name="reset" id="reset" value="Clear">
</form>
</div>
<div data-role="footer">
    <h1>(c) 2015 | Powered by: <a href="http://syntocode.com/hire">Syntocode Technologies</a></h1>
  </div>
</div>
</body>
</html>