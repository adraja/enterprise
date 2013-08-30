<?php

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
$businesstype = $_GET["businesstype"];
$businessname = $_GET["businessname"];
$addr1 = $_GET["addr1"];
$addr2 = $_GET["addr2"];
$city = $_GET["city"];
$state = $_GET["state"];
$zip = $_GET["zip"];
$contactphone = $_GET["contactphone"];
$contactfirstname = $_GET["contactfirstname"];
$contactlastname = $_GET["contactlastname"];
$alloweddomains = $_GET["alloweddomains"];
$loginemail = $_GET["loginemail"];
$loginpassword = $_GET["loginpassword"];
$qrystr = "select id from businesstype where type='".$businesstype."'";
if ( $res = $mysqli->query($qrystr) )
{
	$businesstypeid = $res->fetch_row();
	$insqry = "insert into enterprise (businesstypeid,businessname,addr1,addr2,city,state,zip,contactphone,contactfirstname,contactlastname,alloweddomains,loginemail,loginpassword) values ($businesstypeid,'".$businessname."','".$addr1."','".$addr2."','".$city."','".$state."','".$zip."','".$contactphone."','".$contactfirstname."','".$contactlastname."','".$alloweddomains."','".$loginemail."','".$loginpassword."')";
	$mysqli->query($insqry);
	echo "<h1>Successfully Added Enterprise ".$businessname."</h1>";
}
$mysqli->close()

?>
