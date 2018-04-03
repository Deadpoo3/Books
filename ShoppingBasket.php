<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
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
echo '<span class="state" style="float:right" >目前账户：'.$_GET['Logname'].'</span>';
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

    #bookpic1 {

        width: 200px;
        height: 200px;
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
    <div id="top"><br/><br/>我的购物车<br><br></div>
    <?php
        mysql_connect("localhost","root","root");
        mysql_select_db("book");
        mysql_query("setnames'gbk'");
        $sql="select OrderId,BookID,BookPrice from orders where OrderState='Basket'";
        $result=mysql_query($sql);
        $num=mysql_num_rows($result);
        if($num==0){echo"<script>alert('您的购物车空空如也，快去购物吧！');history.go(-1);</script>";}
        else 
            while($v=mysql_fetch_array($result))
            {
                $sql1="select BookName,BookAuthor,BookPitcure from books where ISBN=".$v[1];
                $result1=mysql_query($sql1);
                $w=mysql_fetch_array($result1);
                echo'
                <div class="lay1"> 
                    <form action="AccountCrea.php?isLog=1&Logname='.$_GET["Logname"].'&pitcure='.$w[2].'&OrderID='.$v[0].'" method="post">
                    <div id="bookpic">
                    <img src="'.$w[2].'" height="200" width="200">
                    </div>
                    &nbsp;书名：<input type="text" name="name" readonly="readonly" style="border:0px; background:none;" value="'.$w[0].'">
                    ISBN：<input type="text" name="ISBN" readonly="readonly" style="border:0px; background:none;" value="'.$v[1].'">
                    作者：<input type="text" name="author" readonly="readonly" style="border:0px; background:none;" value="'.$w[1].'">
                    <br>
                    <br>
                    &nbsp;价格：<input type="text" name="price" readonly="readonly" style="border:0px; background:none;" value="'.$v[2].'">
                    数量：
                    <input name="number" type="text" value="0" style="width:25px;"/>
                    <br>
                    <br>
                    &nbsp;<input type="submit" name="submit" value="确认付款">&nbsp;&nbsp;
                    <a href="deleteOrder.php?isLog=1&Logname='.$_GET["Logname"].'&OrderID='.$v[0].'">
                    <input type="button" name="delete" value="删除"></a>
                    </form>
                </div>
                ';
            }
    ?>
    
</div>

</body>
</html>