<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>F.A.Q</title>
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
    <li><a href="Home_ni.php">退出登录</a></li>
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
&nbsp;&nbsp;
<font size="5">F&nbsp;:哪里能看到登录状态</font><br>
&nbsp;&nbsp;
<font size="5">Q&nbsp;:右上角可见</font>
<br><br>
&nbsp;&nbsp;
<font size="5">F&nbsp;:不登陆能否购物</font><br>
&nbsp;&nbsp;
<font size="5">Q&nbsp;:匿名状态下不能进入购物车以及生成订单</font>
<br><br>
&nbsp;&nbsp;
<font size="5">F&nbsp;:没有账户怎么办</font><br>
&nbsp;&nbsp;
<font size="5">Q&nbsp;:进行注册</font>
<br><br>
&nbsp;&nbsp;
<font size="5">F&nbsp;:还有更多功能吗</font><br>
&nbsp;&nbsp;
<font size="5">Q&nbsp;:有的，尽请期待</font>
</div>
</body>
</html>