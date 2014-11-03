<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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

        $sql = "Select * From $tb WHERE ID =".$_POST["txtID"]; 

        $query=mysql_query($sql); 
        
        $num_rows=mysql_num_rows($query); /* นับ Reccord ที่พบ */ 

        echo "พบข้อมูล $num_rows แถว <br>";
        
        
        echo "ทำการแก้ไขข้อมูลของ ไอดี = ".$_POST["txtID"];
        
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
        $i++;
        }
        ?>
<form action="savedata.php" method="post">
ชื่อผลิตภัณฑ์<input name="txtname" type="text" value="<?php echo $name; ?>"/><br />
ขนาด<input name="txtsize" type="text" value="<?php echo $size; ?>"/><br />
หน่วย<input name="txtunit" type="text" value="<?php echo $unit; ?>"/><br />
ราคา<input name="txtprice" type="text" value="<?php echo $price; ?>"/><br />
ผลิต<input name="txtindate" type="text" value="<?php echo $indate; ?>"/><br />
หมดอายุ<input name="txtexdate" type="text" value="<?php echo $exdate; ?>"/><br />    
เลข อย.<input name="txtcertnumber" type="text" value="<?php echo $certnumber; ?>"/><br />    
<input type="submit" value="บันทึกข้อมูล" />                
</form>
        
        
        
    </body>
</html>
