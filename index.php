<title>Welcome Home | My Bday App</title>
<?php include('header.php'); ?>
<body>
<br/>
<?php
//I need to check if the user is already logged 
If($_SESSION['status'] == "logged" ) 
	{ header('location: dashboard.php');} 
?>
<div class="container">
<div class="alert alert-info"><h3>Glad u made it here, kindly get started by <a href="register.php">Registering An Account </a>OR <a href="login.php">Login Below </a></h3></div>

<ul class="nav nav-tabs" align="center">
  <li class="active"><a aria-expanded="true" href="#home" data-toggle="tab">Login</a></li>
  <li class=""><a aria-expanded="false" href="#profile" data-toggle="tab">Register</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
    <form action="login.php" method="POST">
    <p>Email Address:<br/> <input type="text" name="email" size="30" /></p>
    <p>Password:<br/> <input type="password" name="pass" size="30" /></p>
    <input type="submit" name="submit" class="btn btn-primary" value="Login"> |  <input type="reset" name="reset" class="btn btn-primary" value="Clear">
</form>
  </div>
  <div class="tab-pane fade" id="profile">
    <form action="register.php" method="POST">
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
  </div>
</div>
</body>

</html>

