<?php
include('db.php');
$query = "CREATE TABLE bday_info (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, dob VARCHAR(100) NOT NULL, tel_no VARCHAR(100) NOT NULL)";

if (mysql_query($query))
	{
		$error="false";
		echo "Bday_info table was created succesfully<br/>";
	}
else
	{	
		$error="true";
		echo "Bday_info table wasnt created<br/>";
	}

$query = "CREATE TABLE user_info (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, pass VARCHAR(100) NOT NULL, dob VARCHAR(100) NOT NULL, tel_no VARCHAR(100) NOT NULL, sender_name VARCHAR(100) NOT NULL)";

if (mysql_query($query))
	{
		$error="false";
		echo "user_info table was created succesfully <br/>";
	}
else
	{	die(mysql_error()); //troubleshoot sql error
		$error="true";
		echo "user_info table wasnt created <br/>";
	}
if	($error == false)
	{
		echo "Job weldone, Tables are ready<br/>";
	}
else
	{
		die(mysql_error()); //troubleshoot sql error
		echo "Tables were not created :(";
	}

?>