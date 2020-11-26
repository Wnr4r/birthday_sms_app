<?php
$totalmsg = $_GET['TotalSent'];
$status = $_GET['Status'];
$balance = $_GET['Balance'];

$msg = "A total of was sent";

if (mail("avaot4realgmail.com","Bdayap",$msg))
	{
	echo "Suces";
	}
	else
	{
	echo "errooor";
	}

?>