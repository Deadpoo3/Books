<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>系统规则</title>
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
        <li><a href="Login.php?isLog=0">重新登入</a></li>
        <li><a href="Search.php?isLog=0">搜索书籍</a></li>
        <li><a href="Help.php?isLog=0">帮助中心</a></li>
        <li><a href="FAQ.php?isLog=0">常见问题</a></li>
        <br><br>
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
    <br><br>
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
<br><br><br><br><br>
<div id="content" >
    <font size="5">在使用本系统您应该遵守的规则</font><br><br>
    &nbsp;&nbsp;
    <font size="5">1:保护好自己的账户安全</font>
    <br><br>
    &nbsp;&nbsp;
    <font size="5">2:一步步来，切勿急躁</font>
    <br><br>
    &nbsp;&nbsp;
    <font size="5">3:不要恶意破坏本系统</font>
    <br><br>
    &nbsp;&nbsp;
    <font size="5">4:严禁盗取系统的版权</font>
    <br><br>
    &nbsp;&nbsp;
    <font size="5">5:希望助教学姐给一个好成绩<font>
    </div>
</body>
</html>