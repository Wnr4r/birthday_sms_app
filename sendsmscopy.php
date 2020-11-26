<?php include('header.php'); ?>

<div class="container">
<?php
/**
check db for a birthday and if true, output the list of birthday and associate it with 
the user that registered them  (by picking the email field and checker the user dbase for firstname or sender name). 
 */
include('db.php');
include ('functions.php');
$date = date("d/m");
//search database for a date match
$query = " SELECT * FROM bday_info WHERE dob LIKE '$date%'";
$result= mysql_query($query);
//check if deres a bday	
$check = mysql_num_rows($result);
	if ($check >= 1)
	{
		
			//fetches the array from the dbase
			while ($row = mysql_fetch_array($result))				
			{
				$tel = $row['tel_no'];
				$email = $row['email'];
				$name = $row['firstname'];
				
				//select sender name from user_info database
				$newQuery = "SELECT * FROM user_info WHERE email='$email'";
				if($newResult = mysql_query($newQuery))
					{
						while ($newRow = mysql_fetch_array($newResult))
							{
							$sender = $newRow['sender_name'];
					$msg = urlencode($newRow['message']);
							}
					}
				else
					{
						echo "<div class=\"alert alert-info\">There was an error selecting the sender</div>";
					}
						
						//since i have gotten all the needed param, sms api goes here
				
				//sms sending begins
				$owneremail = "vicpos2000@yahoo.com";
				$subacct = "SMS";
				$subacctpass ="syntopass";
				$request_url = 'http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail='.$owneremail.'&subacct='.$subacct.'&subacctpwd='.$subacctpass.'&message='.$msg.'&sender='.$sender.'&sendto='.$tel.'&msgtype=0';
				$response = get_url($request_url);
				if (strpos($response,'OK') !== false)
					{ 
						echo "done<br/>";
					}
				else
					{
						$echo = "MEssage wasnt sent :(";
					}
				echo "<div class=\"alert alert-success\" align=\"center\"><strong>$msg $name <br/> Wishes from $sender <br/> Tel number is: $tel </div><hr/>";
				
			}
	}
		else
			{
				echo "<div class=\"alert alert-warning\">No bday today $date</div>" ;
			}

?>
</div>
</body>
</html>