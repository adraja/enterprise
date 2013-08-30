<?php

use PFBC\Form;
use PFBC\Element;

session_start();

include("PFBC/Form.php");
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

$form = new Form("Create Employer Account");
$form->configure(array("action" => "createenterprise.php", "method" => "get"));
$form->addElement(new Element\HTML("<img src='Nutriligence.png'><h1>Add an Employer</h1>"));
$form->addElement(new Element\Select("Business Type: ", "businesstype", $businesstypes));
$form->addElement(new Element\TextBox("Business Name:", "businessname"));
$form->addElement(new Element\TextBox("Stree Address1:", "addr1"));
$form->addElement(new Element\TextBox("Stree Address2:", "addr2"));
$form->addElement(new Element\TextBox("City:", "city"));
$form->addElement(new Element\TextBox("State:", "state"));
$form->addElement(new Element\TextBox("Zip:", "zip"));
$form->addElement(new Element\TextBox("Contact Phone:", "contactphone"));
$form->addElement(new Element\TextBox("Contact First Name:", "contactfirstname"));
$form->addElement(new Element\TextBox("Contact Last Name:", "contactlastname"));
$form->addElement(new Element\TextBox("Allowed domains:", "alloweddomains"));
$form->addElement(new Element\TextBox("login email:", "loginemail"));
$form->addElement(new Element\TextBox("login password:", "loginpassword"));
$form->addElement(new Element\Button("Submit"));
$form->addElement(new Element\Button("Cancel", "button", array("onclick" => "history.go(-1);")));
$form->render();
$mysqli->close();
?>
