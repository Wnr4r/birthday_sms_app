<?php
if ($dbc = mysql_connect('localhost','syntocod_bdayapp', 'xF1EG=83,7ny')){
}
    if($db_select = mysql_select_db('syntocod_bdayapp', $dbc)){}

else
{
echo  "error could not select <br/>";
die(mysql_error()); //troubleshoot sql error
}

?>