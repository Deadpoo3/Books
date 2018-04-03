<?php
$OrderID=$_GET["OrderID"];
mysql_connect("localhost","root","root");
mysql_select_db("book");
mysql_query("setnames'gbk'");
$sql="delete from orders where OrderID='$OrderID'";
$res_insert1=mysql_query($sql);
if($res_insert1){
	echo"<script>alert('订单已删除！');window.location='Home.php?isLog=1&Logname=$_GET[Logname]';</script>";
}
else{
	echo"<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
}
?>