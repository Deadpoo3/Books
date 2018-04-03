<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
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
            position: relative;
        }
        #content {
            margin: 0;
            padding: 0;
            position:relative;
            width:50%;
			left:35%;
			z-index:80;
        }
    </style>
</head>
<body>
<div id="background" style="position:fixed;left:0px;width:100%;height:100%;z-index=0">
<img src="BackGround.jpg" width="100%" height="100%"/>
</div>
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

<img style="left:10%;position:fixed" border="0" src="logo.png" alt="Pulpit rock" width="15%" height="25%" >
<br><br>
<div style="z-index:90;position:fixed;left:45%">
<br><br>
<h3>精品书籍推荐</h3>
</div>
<div id="content">
<br><br><br><br><br>
<?php
echo '
<p>
    <a href="Search.php?isLog=1&Logname='.$_GET["Logname"].'">
        <img border="0" src="Book1.png" alt="Pulpit rock" width="20%" height="25%" title="这是第一本书">
    </a>
    <a href="Search.php?isLog=1&Logname='.$_GET["Logname"].'">
        <img border="0" src="Book2.png" alt="Pulpit rock" width="20%" height="25%" title="这是第二本书">
    </a>
    <a href="Search.php?isLog=1&Logname='.$_GET["Logname"].'">
        <img border="0" src="Book3.png" alt="Pulpit rock" width="20%" height="25%" title="这是第三本书">
    </a>

</p>
';
?>


</div>
</body>
</html>