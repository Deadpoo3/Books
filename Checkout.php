<?php
if(isset($_POST["submit"])&&$_POST["submit"]=="确认付款")
{
    $BookId=$_POST["ISBN"];
    $MemberName=$_GET["Logname"];
    $OrderNum=$_POST["number"];
    $OrderTime=date('Y-m-d H:i:sa');
    $OrderState="Paid";
    $BookPrice=$_POST["price"]*$_POST["number"];
    $address=$_POST["address"];
    $card=$_POST["card"];
    $password=$_POST["password"];
    if($BookId==""||$MemberName==""||$OrderNum==""||$OrderTime==""||$OrderState==""||$BookPrice==""||$address==""||$card==""||$password=="")
    {
        echo"<script>alert('请填写完整的信息！');history.go(-1);</script>";
    }
    else
    {
        mysql_connect("localhost","root","root");
        mysql_select_db("book");
        mysql_query("setnames'gbk'");
        $judge="select BookRemainNum,BookActive from books where ISBN='$BookId'";
        $judge2=mysql_query($judge);
        $judge3=mysql_fetch_array($judge2);
        $judge4=$judge3[0];
        $judge5=$judge3[1];
        if($judge4<$OrderNum){
            echo"<script>alert('书籍剩余量不足！');history.go(-1);</script>";
        }
        else if($judge5==0){
            echo"<script>alert('书籍不可买！');history.go(-1);</script>";
        }
        else{
            $sql1="select count(OrderID) from orders";
            $result=mysql_query($sql1);
            $row=mysql_fetch_array($result);
            $num=$row[0]+1;
        //echo "<script>alert('$row[0]');</script>";
            $sql="insert into orders values('$num','$BookId','$MemberName','$OrderNum','$OrderTime','$OrderState','$BookPrice');";
            $res_insert=mysql_query($sql);
            if($res_insert){
                $sql2="select BookSoldNum,BookRemainNum from books where ISBN='$BookId'";
                $result2=mysql_query($sql2);
                $row2=mysql_fetch_array($result2);
                //echo "<script>alert('$row[0]');</script>";
                $remainNum=$row2[1]-$OrderNum;
                $soldNum=$row2[0]+$OrderNum;
                $sql3="update books set BookSoldNum='$soldNum',BookRemainNum='$remainNum' where ISBN='$BookId'";
                $res_insert1=mysql_query($sql3);
                if($res_insert1){
                    echo"<script>alert('订单生成成功！您已付款！');window.location='Home.php?isLog=1&Logname=$_GET[Logname]';</script>";
                }
                else{
                    echo"<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
                }
            }
            else {
                echo"<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
            }
        }
        
    }
}
else
{
    echo"<script>alert('提交未成功！');history.go(-1);</script>";
}
?>