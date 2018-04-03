<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单创建</title>
    <style>
        body {
            text-align: center
        }

        div {
            margin: 0 auto;
        }

        #header a {
            color: black;
            text-decoration: none;
        }

        #header ul {
            margin: 0;
            padding: 0;
        }

        #header li {
            display: inline;
        }

        #header a:hover { /*这个大概的意思就是当鼠标放到这个a元素的上面时，这个a元素的样式就按下面的代码执行*/
            border: 1px solid black;
            color: black;
            background: whitesmoke;
        }

        #header {
            font-size: large;
            text-align-last: center;
        }

        #content {
            margin: 0;
            padding: 0;
            font-size: large;

        }

    </style>
</head>
<body background="src/img/BackGround.jpg" style="background-size: cover">
<div id="header" > 
<?php
    echo'
    <li><a href="Home.php?isLog=1&Logname='.$_GET["Logname"].'">主页</a></li>
    <li><a href="SignUp.php?isLog=1&Logname='.$_GET["Logname"].'">新用户注册</a></li>
    <li><a href="Search.php?isLog=1&Logname='.$_GET["Logname"].'">搜索书籍</a></li>
    <li><a href="ShoppingBasket.php?Logname='.$_GET["Logname"].'">购物车</a></li>
    <li><a href="Help.php?isLog=1&Logname='.$_GET["Logname"].'">帮助中心</a></li>
    <li><a href="FAQ.php?isLog=1&Logname='.$_GET["Logname"].'">常见问题</a></li>
    <li><a href="Login.php?isLog=1&Logname='.$_GET["Logname"].'">更换账号</a></li>
    <li><a href="Home_ni.php">退出登录</a></li>
    ';
?>
</div>
<div>
<?php
    echo '
    <span class="state" style="float:right" >目前账户：'.$_GET['Logname'].'</span>
    ';
?>
</div>
<style>
    #top {
        color: blue;
        text-align: center;
        font-size: large;
        width: 1000px;
        border-bottom: 1px solid #979797;
    }

    #bookpic {
        width: 200px;
        height: 200px;
        float: left;
    }

    #button {
        text-align-last: center;
        float: left;
        clear: left;
    }

    #creat {
        float: left;
        clear: left;
    }

    .lay1 {
        height: 200px;
        width: 1000px;
        border-bottom: 1px solid #979797;
        border-left: 1px solid #979797;
        border-right: 1px solid #979797;
    }
</style>
<div id="content" style="text-align: left">
    <div id="top"><br>创建订单<br><br></div>
    <?php
    if(isset($_POST["submit"])&&$_POST["submit"]=="立即购买")
    {
        if($_GET['Logname']==""){
            echo"<script>alert('请登录');history.go(-1);</script>";
        }
        else{
            echo'
            <div class="lay1">
                <div id="bookpic">
                    <img src="'.$_GET["pitcure"].'" height="200" width="200">
                </div>
                <form action="Checkout.php?isLog=1&Logname='.$_GET["Logname"].'" method="post">
                &nbsp;书名：<input type="text" name="BookName" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["name"].'">
                ISBN：<input type="textarea" name="ISBN" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["ISBN"].'">
                作者：<input type="textarea" name="author" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["author"].'">
                <br>
                <br>
                &nbsp;书本单价：<input type="textarea" name="price" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["price"].'">
                购买数量：<input type="text" name="number" id="number">
                <div id="creat">
                    &nbsp;收货地址：<input type="text" name="address">
                    <br>
                    <br>
                    &nbsp;付款卡号：<input type="text" name="card">
                    <br>
                    <br>
                    &nbsp;付款密码：<input type="password" name="password">
                    <br>
                    <br>
                </div>
                <div id="button">
                    &nbsp;<input type="submit" name="submit" value="确认付款">&nbsp;&nbsp;
                    <a href="Home.php?isLog=1&Logname='.$_GET["Logname"].'">
                    <input type="button" name="cancel" value="取消">
                    </a>
                </div>
                </form>
            </div> 
            ';
        }
    } 
    else if(isset($_POST["submit"])&&$_POST["submit"]=="加入购物车")
    {
        if($_GET['Logname']==""){
            echo"<script>alert('请登录');history.go(-1);</script>";
        }
        else{
            $BookId=$_POST["ISBN"];
            $MemberName=$_GET["Logname"];
            $OrderNum=1;
            $OrderTime=date('Y-m-d H:i:sa');
            $OrderState="Basket";
            $BookPrice=$_POST["price"];
            mysql_connect("localhost","root","root");
            mysql_select_db("book");
            mysql_query("setnames'gbk'");
            $sql1="select count(OrderID) from orders";
            $result=mysql_query($sql1);
            $row=mysql_fetch_array($result);
            $num=$row[0]+1;
            //echo "<script>alert('$row[0]');</script>";
            $sql="insert into orders values('$num','$BookId','$MemberName','$OrderNum','$OrderTime','$OrderState','$BookPrice');";
            $res_insert=mysql_query($sql);
            if($res_insert){
                echo"<script>alert('已加入购物车！');window.location='ShoppingBasket.php?isLog=1&Logname=$_GET[Logname]';</script>";
            }
            else {
                echo"<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
            }
        }
    } 
    else if(isset($_POST["submit"])&&$_POST["submit"]=="确认付款"){
        if($_GET['Logname']==""){
            echo"<script>alert('请登录');history.go(-1);</script>";
        }
        else{
            echo'
            <div class="lay1">
                <div id="bookpic">
                    <img src="'.$_GET["pitcure"].'" height="200" width="200">
                </div>
                <form action="BasketOrders.php?isLog=1&Logname='.$_GET["Logname"].'&OrderID='.$_GET["OrderID"].'" method="post">
                &nbsp;书名：<input type="text" name="BookName" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["name"].'">
                ISBN：<input type="textarea" name="ISBN" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["ISBN"].'">
                作者：<input type="textarea" name="author" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["author"].'">
                <br>
                <br>
                &nbsp;书本单价：<input type="textarea" name="price" readonly="readonly" style="border:0px; background:none;" value="'.$_POST["price"].'">
                购买数量：<input type="text" name="number" id="number">
                <div id="creat">
                    &nbsp;收货地址：<input type="text" name="address">
                    <br>
                    <br>
                    &nbsp;付款卡号：<input type="text" name="card">
                    <br>
                    <br>
                    &nbsp;付款密码：<input type="password" name="password">
                    <br>
                    <br>
                </div>
                <div id="button">
                    &nbsp;<input type="submit" name="submit" value="确认付款">&nbsp;&nbsp;
                    <a href="Home.php?isLog=1&Logname='.$_GET["Logname"].'">
                    <input type="button" name="cancel" value="取消">
                    </a>
                </div>
                </form>
            </div> 
            ';
        }
    }
    else
    {
        echo"<script>alert('提交未成功！');history.go(-1);</script>";
    }

    ?>
</div>

</body>
</html>