<?php

/*******************************���ò���********************/

$db_host='localhost';
$db_username='root';
$db_password='';
$db_name='crawler';
$connection=mysql_connect($db_host,$db_username,$db_password);    //�������ݿ�
if(!$connection)
{
die ("could not connect to the database:<br>".mysql_error());
}
mysql_select_db($db_name,$connection);                           //ѡ�����ݿ�
mysql_query("set names gbk");

/***********************************************************/

function getconf($table,$filter=""){

//echo "select * from ".$table.$filter;
	$result=mysql_query("select * from ".$table.$filter);
	$confarray=array();
	while($row=mysql_fetch_array($result)){
	$confarray[]=$row;
	}
	//printf($confarray);
	return $confarray;
}











?>
