<title>User Dashboard | My Bday App</title>
<?php include('header.php'); ?>
<div class="container">

<table width="100%" class="table-bordered table-hover">
<?php 

//keeps a track of the user to know if he's trying to bypass login page
$_SESSION['counter'] = 1;
$username = $_SESSION['username'];
include('db.php');
echo '<div class="alert alert-success" align="center"><strong>Howdy ' ."$username".',<br/>
  Your Login was successful, Welcome on board<br/>';
//check login status
if ($_SESSION['status'] == "logged")
{
	//set avriable, initialize counter and run db query

	$email = $_SESSION['email']; //email is the email of the logged user
	$query = "SELECT * FROM bday_info WHERE email='$email'";
	$result= mysql_query($query);
	$check = mysql_num_rows($result); //check number of rows returned
	if ($check >=1 ) //check if user has bdays registered
		{
		echo 'Below are the lists of Birthdays you\'ve registered on this site</strong></div>';
		echo '
<thead><tr class="info"><th>S/N</th> <th>F. Name</th> <th>L. Name</th> <th>DOB</th> <th>Tel No</th></tr></thead>';

			$counter = 1; //serial number
			//fetches the array from the dbase and list bdays 
			while ($row = mysql_fetch_array($result))
	
				{
					echo "<tr> <td>$counter</td><td>{$row['firstname']}</td> <td>{$row['lastname']}</td> <td>{$row['dob']}</td> <td>{$row['tel_no']}<br/> <a href=\"edit.php?id={$row['id']}\">Edit</a> | <a href=\"delete.php?id={$row['id']}\">delete</a></td></tr>";
	
					$counter++;

				}
		}
	else
		{
		echo '<div class="alert alert-warning">
  <strong>You have not registered any birthday on your account, Please <a href="reg.php">Add New Birthdays here</a> to get started</strong></div>';
		}
}
else
{
//not logged in
header('location: login.php');
}

?>
</table>

</div>
<?php include('footer.php'); ?>
