<?php
/*
ở day t xai wamp va tao 1 database ten la kncsdl va co 1 table la user
*/
$hostname="localhost";
$user="root";
$pass="";
$databasename="kncsdl";
include "kncsdl.php";
//kncsdl($hostname,$user,$pass,$databasename);
//t moi tạo 1 table co ten la user có 2 cot la user và pass
laytaikhoan();
demsl();
//dongkn();
?>
