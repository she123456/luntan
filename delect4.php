<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/15
 * Time: 10:24
 */

session_start();

if(isset($_SESSION['username'])==false)
{
    echo"需要登录后才可以删帖";
    exit;
}

include('input4.php');
$input=new input();
include('db4.php');
$ID=$input->get('ID');
$sql="DELETE FROM `all_messages` WHERE ID='{$ID}'";
$is=$mysqli->query($sql);


if($is==true){
    header("Location:text4.php");
}
else{
    echo"没有成功删除帖子！";
}
?>