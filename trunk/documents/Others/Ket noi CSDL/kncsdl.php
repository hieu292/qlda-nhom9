<meta http-equiv="content-type", content="charset=UTF-8"/>
<?php
/*
dưới day là 2 cách ket noi csdl cho mysql
tạo hàm kncsdl() rồi truyen tham so vao cho no
c2 là tao file dbcon.inc roi goi no moi lan muon truy van và dong lai

*/
function kncsdl($hostname,$user,$pass,$databasename)
{
	global $conn;
	$conn=mysql_connect($hostname, $user,$pass) or die("không thể kết nối csdl");
	mysql_select_db($databasename,$conn);
}
function laytaikhoan()
{
	require "dbcon.inc";
	$sql="select * from user";
	$query=mysql_query($sql);
	if(mysql_num_rows($query) == 0)
	{
		echo "Chua co du lieu";
	}
	else
	{
		while($row=mysql_fetch_array($query))//select xong thi gan vo 1 mang la row
		{
			echo $row[0]."  -  ".$row[1]."<br/>";//row [0][1] tuong ung la user va pass
		}
	}
	mysql_close($conn);
}
function demsl()
{
	require "dbcon.inc";
	$sql = "select * from user"; 
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	echo "Số lượng tài khoản = $num";
	mysql_close($conn);
}
?>