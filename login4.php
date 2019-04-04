<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/20
 * Time: 18:19
 */
session_start();
include('input4.php');
$input=new input();
include('db4.php');

$act=$input->get('act');
if($act!==false){
    $username=$input->post('username');
    $password=$input->post('password');
//    var_dump($username,$password);
    $sql="SELECT * FROM adm WHERE username='{$username}'and password='{$password}'";
//    echo $sql;
    $mysqli_result=$mysqli->query($sql);

    if($row=$mysqli_result->fetch_array()){
//    echo"管理员登陆成功";
        $_SESSION['username']=$row['username'];
        header("Location:text4.php");
    }
    else{
        echo"请确认你的账号和密码。";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>用户登录</title>
</head>
<body>
<div>
    <form action="login4.php?act=chk" method="post">
        <input type="text" name="username"/>
        <input type="password" name="password"/>
        <input type="submit" value="点击登录"/>
    </form>

</div>
</body>
</html>
