<?php

session_start();

$databaseserver="mysql-nfcsoc.lifera.com";
$database="nfcsoc";
$databaseuser="trefera11";
$databasepassword="281064";
$mysqli = new mysqli($databaseserver, $databaseuser, $databasepassword, $database); 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}
else 
{
//  echo "Connection was OK!\n";
}
$businesstypes = array();


if ( $res = $mysqli->query("select type from businesstype") )
{
	while ( $row = $res->fetch_row() )
	{
		$businesstypes[] = $row[0];
	}
}

$mysqli->close();
?>
