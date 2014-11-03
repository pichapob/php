<?php
//echo $_POST["txtid"];
//echo $_POST["txtname"];
//echo $_POST["txtsize"];
//echo $_POST["txtunit"];
//echo $_POST["txtprice"];
//echo $_POST["txtindate"];
//echo $_POST["txtexdate"];
//echo $_POST["txtcertnumber"];

$id     = $_POST["txtid"];
$name   = $_POST["txtname"];
$size   = $_POST["txtsize"];
$unit   = $_POST["txtunit"];
$price   = $_POST["txtprice"];
$indate   = $_POST["txtindate"];
$exdate   = $_POST["txtexdate"];
$cnumber   = $_POST["txtcertnumber"];

$host = "localhost"; 	
$username = "root"; 
$password = "1234"; 
$db = "cosmetic"; 
$tb = "product"; 

mysql_connect($host,$username,$password) or die ("ติดต่อฐานข้อมูลไม่ได้"); 
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); /* ทําการเลือกฐานข้อมูลก่อน */
mysql_query("SET NAMES utf8");

$sql = "UPDATE $tb ";
$sql .= "SET name='$name', size='$size', unit='$unit',price='$price',";
$sql .= "indate='$indate', exdate='$exdate' , certnumber='$cnumber' ";
$sql .= "WHERE ID = $id";

//echo $sql;
// ID name size unit price indate exdate certnumber 

$query=mysql_query($sql);

echo 'อัพเดทข้อมูลสำเร็จ';


?>
