<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookInfo</title>
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

    .lay1 {
        height: 200px;
        width: 1000px;
        border-bottom: 1px solid #979797;
        border-left: 1px solid #979797;
        border-right: 1px solid #979797;
    }

</style>
<div id="content" style="text-align: left">
    <div id="top"><br>书籍详细信息<br><br></div>
    <?php
    if(isset($_POST["submit"])&&$_POST["submit"]=="搜索")
    {
        $type=$_POST["SearchType"];
        $content=$_POST["name"];
        if($type==""||$content=="")
        {
            echo"<script>alert('请填写搜索的内容');history.go(-1);</script>";
        }
        else
        {
            mysql_connect("localhost","root","root");
            mysql_select_db("book");
            mysql_query("setnames'gbk'");
            if($type=="ISBN"){
                $sql="select BookName,ISBN,BookAuthor,BookPrice,BookRemainNum,BookPitcure,BookNote from books where ISBN='$_POST[name]'";
            }
            else if($type=="author"){
                $sql="select BookName,ISBN,BookAuthor,BookPrice,BookRemainNum,BookPitcure,BookNote from books where BookAuthor='$_POST[name]'";
            }
            else if($type=="bookName"){
                $sql="select BookName,ISBN,BookAuthor,BookPrice,BookRemainNum,BookPitcure,BookNote from books where BookName='$_POST[name]'";
            }
            $result=mysql_query($sql);
            $num=mysql_num_rows($result);
            if($num==0){echo"<script>alert('您输入的书籍不存在');history.go(-1);</script>";}
            else 
                while($v=mysql_fetch_array($result))
                {
                    echo'
                    <div class="lay1">
                        <div id="bookpic">
                            <img src='.$v[5].' height="200" width="200">
                        </div>
                        <form action="AccountCrea.php?isLog=1&Logname='.$_GET["Logname"].'&pitcure='.$v[5].'" method="post">
                        &nbsp;书名：<input type="textarea" name="name" readonly="readonly" style="border:0px; background:none;" value='.$v[0].'>
                        ISBN：<input type="textarea" name="ISBN" readonly="readonly" style="border:0px; background:none;" value='.$v[1].'>
                        作者：<input type="textarea" name="author" readonly="readonly" style="border:0px; background:none;" value='.$v[2].'>
                        <br>
                        <br>
                        &nbsp;价格：<input type="textarea" name="price" readonly="readonly" style="border:0px; background:none;" value='.$v[3].'>
                        剩余数量：<input type="textarea" readonly="readonly" style="border:0px; background:none;" value='.$v[4].'>
                        <br>
                        &nbsp;详情：<br>
                        &nbsp;<textarea style="height:50px;width:300px;border:0px; background:none;" readonly="readonly">'.$v[6].'</textarea>
                        <br>
                        &nbsp;<input type="submit" name="submit" value="加入购物车" onclick="BasketOrders.php">&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="立即购买">
                        </form>
                    </div>
                    ';
                }
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