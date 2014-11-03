<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link rel="stylesheet" href="css" />-->
<title>แสดงรายการสินค้า</title>
</head>

<body>
<?php
$host = "localhost"; 	
$username = "root"; 
$password = "1234"; 
$db = "cosmetic"; 
$tb = "product"; 

mysql_connect($host,$username,$password) or die ("ติดต่อฐานข้อมูลไม่ได้"); 
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); /* ทําการเลือกฐานข้อมูลก่อน */

mysql_query("SET NAMES utf8");
 
$sql = "Select * From $tb"; 

$query=mysql_query($sql); 
$num_rows=mysql_num_rows($query); /* นับ Reccord ที่พบ */ 

echo "<center>มีข้อมูลในตาราง ทั้งหมด $num_rows แถว</center>";

?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#CC9900">
    <th height="54" scope="col">รหัสสินค้า</th>
    <th scope="col">ชื่อผลิตภัณฑ์</th>
    <th scope="col">ขนาด</th>
    <th scope="col">หน่วย</th>
    <th scope="col">ราคา</th>
    <th scope="col">วันที่ผลิต</th>
    <th scope="col">วันหมดอายุ</th>
    <th scope="col">เลขที่แจ้ง อย.</th>
    <th scope="col">แก้ไข</th>
  </tr>
<?php
$i=0; 
while($i < $num_rows) 
{ 
$result = mysql_fetch_array($query);

$ID = $result["ID"];
$name = $result["name"];
$size = $result["size"];
$unit = $result["unit"];
$price = $result["price"];
$indate = $result["indate"];
$exdate = $result["exdate"];
$certnumber = $result["certnumber"];


$indate = new DateTime($indate);
$indate = $indate->format('d-m-Y');

$exdate = new DateTime($indate);
$exdate = $exdate->format('d-m-Y');


$certnumber = substr($certnumber,0,2)."-".substr($certnumber,2,1)."-".substr($certnumber,3,7);

$color = '#F5D76E';
if($i%2==0){$color = '#F4D03F';}

echo "  
<tr bgcolor='$color'>
    <td height='36'><center>$ID</center></td>
    <td><center>$name</center></td>
    <td><center>$size</center></td>
    <td><center>$unit</center></td>
    <td><center>$price</center></td>
    <td><center>$indate</center></td>
    <td><center>$exdate</center></td>
    <td><center>$certnumber</center></td>


    <td>
        <center>
            <form action='editdata.php' method='post'>
               <input name='txtID' type='hidden' value='$ID'>
               <input type='submit' value='แก้ไข'>
            </form>
        </center>
    </td>





</tr>
";

$i++;
}
?> 

</table>
   
</body>
</html>
