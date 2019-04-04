<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/22
 * Time: 11:16
 */
date_default_timezone_set('PRC'); //东八时区 echo date('Y-m-d H:i:s');
//date_default_timezone_set()设置

session_start();
//var_dump($_SESSION);
include('db4.php');

if(isset($_SESSION['username'])==false)
{
    echo"需要登录后才可以回帖";
    exit;
}

include('input4.php');
$input=new input();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>回复帖子</title>
    <style>
        .add{
            width:500px;
            margin: 0 auto;
            overflow:hidden;
        }
        .add textarea{
            width:90%;
            height:200px;
            background-color: pink;
        }
        .add .user{
            float:left;
        }
        .add .btn{
            float:right;
        }

    </style>
</head>
<body>
<div class="add">
    <form action="222.php" method="post">
        <textarea name="con">回复的内容：</textarea>
        <input class="user" name="xm" type="text" placeholder="回帖人"/>
        <input class="btn" type="submit" value="发布"/>


    </form>
</div>


</body>
</html>
