<?php
$conn = mysql_connect("localhost","root","147371QIANhc");
if (!$conn){
    die("Failed to connect to database: " . mysql_error());
}
mysql_select_db("tp",$conn);

mysql_query("set character set 'utf-8'");

mysql_query("set names 'utf-8'");
?>