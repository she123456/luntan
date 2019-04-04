<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/20
 * Time: 17:00
 */
date_default_timezone_set('PRC'); //东八时区 echo date('Y-m-d H:i:s');
//date_default_timezone_set()设置

session_start();
//var_dump($_SESSION);
include('db4.php');
//取数据
$sql="SELECT * FROM all_messages ORDER BY ID DESC";
$mysqli_result=$mysqli->query($sql);

$rows=array();
while(true){
    $row=$mysqli_result->fetch_array(MYSQLI_ASSOC);
    if($row==false){
        break;
    }
    $rows[]=$row;
}




//取数据
$sql="SELECT * FROM hui ORDER BY ID DESC";
$mysqli_result=$mysqli->query($sql);

$pps=array();
while(true){
    $pp=$mysqli_result->fetch_array(MYSQLI_ASSOC);
    if($pp==false){
        break;
    }
    $pps[]=$pp;
    //var_dump($pps);
    //exit;
}
//var_dump($rows);

//$mysqli=new mysqli('localhost','root','root','db_messages');
//if($mysqli->connect_errno > 0 ){
//    echo"连接错误";
//    echo $mysqli->connect_error;
//    exit;
//}
//$mysqli->query("SET NAMES UTF8");//防止在数据库里面乱码

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>论坛</title>
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
        .msg{
            width:500px;
            margin: 60px auto;
            overflow:hidden;


        }
        .item{
            border:solid 3px forestgreen;
            background-color:lightcyan;

        }
        .item .time{
            float:right;
            color:red;

            font-size:18px;
        }
        .item .user{
            float:left;
            color:darkorange;
            font-size:18px;
        }

        .msg1{
            width:450px;
            margin: 30px auto;
            overflow:hidden;

        }
        .item1{
            border:solid 1px darkorange;margin: 15px 0;
            background-color:antiquewhite;
        }
        .item1 .time1{
            float:right;
            color:red;

            font-size:18px;
        }
        .item1 .user1{
            float:left;
            color:darkorange;
            font-size:18px;
        }

    </style>
</head>
<body>
<div class="add">
    <form action="111.php" method="post">
        <textarea name="msg">发布的内容：</textarea>
        <input class="user" name="user" type="text" placeholder="发帖人"/>
        <input class="btn" type="submit" value="发表"/>
        <a class="btn" href="tuichu4.php">退出</a>
        <a class="btn" href="login4.php">登录</a>
        <a class="btn" href="zhuce4.php">注册</a>

    </form>

</div>
<div class="msg">
    <?php
    //    for($i=0;$i<count($rows);$i++) {
    //
    //echo $rows[$i]['ID'];
    foreach($rows as $row){
    $t= date("Y-m-d H:i:s",$row['time']);
    ?>
    <div class="item">
        <span class="user"><?php echo $row['name'];?></span>
        <span class="time"><?php echo $t;?>
            <?php
            if(isset($_SESSION['username']))
            {
                ?>
                <a  onclick='return confirm("你确定要删除这条帖子吗？")'; href="delect4.php?ID=<?php echo $row['ID'];?>">删帖</a>

                <a  href="hui4.php?ID=<?php echo $row['ID'];?>">回帖</a>
                <?php
            }
            ?>
            </span>

        <div style="clear:both;"></div>
        <p>
            <?php echo $row['content'];?>
        </p>

        <div class="msg1">
            <?php

            foreach($pps as $pp){
                $t= date("Y-m-d H:i:s",$pp['time']);
                ?>
                <div class="item1">
                    <span class="user1"><?php echo $pp['xm'];?></span>
                    <span class="time1"><?php echo $t;?>

                        <?php
                        if(isset($_SESSION['username']))
                        {
                            ?>
                            <a  onclick='return confirm("你确定要删除这条回帖吗？")'; href="shanhui4.php?id=<?php echo $pp['id'];?>">删回帖</a>


                            <?php
                        }
                        ?>
            </span>


                    <div style="clear:both;"></div>
                    <p>
                        <?php echo $pp['con'];?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        }
        ?>


    </div>
</body>
</html>
