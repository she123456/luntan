<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/27
 * Time: 23:42
 */
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
echo"你已经成功退出！";
sleep("1");
header("Refresh:1;url=text4.php");
?>