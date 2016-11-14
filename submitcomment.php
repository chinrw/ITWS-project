<?php
header("Content-Type:text/html; charset=utf-8");
include('conn.php');
mysql_query("set names utf8");
mysql_set_charset('utf8');

$str1=$_POST['comments'];


$q1 = mysql_query("insert into comment(`content`) values('$str1')");



function injectChk($sql_str) { 
		$check = eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
		if ($check) {
			echo('failed');
			exit ();
		} else {
			return $sql_str;
		}
}

?>