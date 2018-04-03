<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
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

        }


    </style>
</head>
<body background="src/img/BackGround.jpg" style="background-size: cover">
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
<div>
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
<div id="content">
<?php
echo '
    <form action="BookInfo.php?isLog='.$_GET['isLog'].'&Logname='.$_GET['Logname'].'" method="post"> 
    <input type="radio" checked="checked" name="SearchType" value="ISBN"/>ISBN
    <input type="radio" name="SearchType" value="author"/>作者
    <input type="radio" name="SearchType" value="bookName"/>书名
    <br/>
    <input type="text" name="name"> 
    <input type="submit" name="submit" value="搜索">
    <br><br>
    ';
?>
</div>

</body>
</html>