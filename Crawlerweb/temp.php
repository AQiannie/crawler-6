<html>
<head>
<title>
չʾ����
</title>
</head>
<body>
<center>
<?php
require 'DBUtil.php';
//$db=new DBUtil();
//$id=$_GET["id"];
function showFriends()
{
    $db=new DBUtil();
	$result=$db->getFriends("10");
	echo"<table border=1>";
	echo "<tr><td>ID</td><td>�����б�</td><td>������</td></tr>";
	while($info=mysql_fetch_array($result))
	{
		echo"<tr>";
       // $query="select * from crawler_contents where history_id='$history_id' AND rc_id=2";
		//$this->result=mysql_query($query);
		echo"<td>shenzhenyuyuyu@gmail.com</td>";
		echo"<td>".$info['content']."</td>";
		//$count = substr_count($info['content'],",");
        //$count=$count+1;
		$count=$db->getFriendsNumber($info['content']);
		echo"<td>".$count."</td>";
        echo"</tr>";
	}
       echo "</table>";
}

function  showArticles()
{
	$db=new DBUtil();
	$result=$db->getArticles("39");
    echo"<table border=1>";
	echo "<tr><td>ID</td><td>����</td><td>����</td></tr>";
	while($info=mysql_fetch_array($result))
	{
		echo"<tr>";
		echo"<td>Ҧ��</td>";
		echo"<td>".$info['title']."</td>";
		echo"<td>".$info['content']."</td>";
        echo"</tr>";
	}
	echo"</table>";
}
echo"�����б�";
showFriends();
echo"<p>";
echo"���£�";
showArticles();
?>
</center>
</body>
</html>