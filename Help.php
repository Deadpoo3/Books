<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帮助中心</title>
    <style>
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
            position: relative;
        }
        #content {
            margin: 0;
            padding: 0;
            border:1px solid black;
            width:40%;          
            float:center;
            left:30%;
            height: 320px;
            position:relative;
        }
    </style>
</head>
<body>
<div id="background" style="position:fixed;left:0px;width:100%;height:100%;z-index=0">
<img src="BackGround.jpg" width="100%" height="100%"/>
</div>
<div id="header">
<?php
    if($_GET['isLog']==0){
    echo '
        <li><a href="Home_ni.php">主页</a></li>
        <li><a href="SignUp.php?isLog=0">新用户注册</a></li>
        <li><a href="Login.php?isLog=0">登入</a></li>
        <li><a href="Search.php?isLog=0">搜索书籍</a></li>
        <li><a href="Help.php?isLog=0">帮助中心</a></li>
        <li><a href="FAQ.php?isLog=0">常见问题</a></li>
        ';
    }
    else if ($_GET['isLog']==1) {
    echo'
    <li><a href="Home.php?isLog=1&Logname='.$_GET["Logname"].'">主页</a></li>
    <li><a href="SignUp.php?isLog=1&Logname='.$_GET["Logname"].'">新用户注册</a></li>
    <li><a href="Search.php?isLog=1&Logname='.$_GET["Logname"].'">搜索书籍</a></li>
    <li><a href="ShoppingBasket.php?Logname='.$_GET["Logname"].'">购物车</a></li>
    <li><a href="Help.php?isLog=1&Logname='.$_GET["Logname"].'">帮助中心</a></li>
    <li><a href="FAQ.php?isLog=1&Logname='.$_GET["Logname"].'">常见问题</a></li>
    <li><a href="Login.php?isLog=1&Logname='.$_GET["Logname"].'">更换账号</a></li>
    <li><a href="Home_ni.php">退出登录</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ';
    } 
?> 
</div>
<div style="position:relative; float:right">
<?php
    if($_GET['isLog']==0){
    echo '
        <span class="state" style="float:right">目前处于匿名状态</span>
        ';
    }
    else if ($_GET['isLog']==1) {
        echo '
        <span class="state" style="float:right" >目前账户：'.$_GET['Logname'].'</span>
        ';
    } 
?>
</div>
<br>
<br><br><br><br><br>
</div>
<div id="content">
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php
echo '
<font size="5">遇到问题了？</font>
<a href="FAQ.php?isLog='.$_GET["isLog"].'&Logname='.$_GET["Logname"].'">
    <font size="4" color=#8968CD>查看F.A.Q</font></a>
    <br><br><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <font size="5">想查看系统规则？</font>
    <a href="Rules.php?isLog='.$_GET["isLog"].'&Logname='.$_GET["Logname"].'">
    <font size="4" color=#8968CD>查看系统规则</font></a>
    <br><br><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <font size="5">想联系我们？</font>
    <a href="Contact.php?isLog='.$_GET["isLog"].'&Logname='.$_GET["Logname"].'">
    <font size="4" color=#8968CD>如何联系我们</font></a>
    ';
?>


</div>
</body>
</html>