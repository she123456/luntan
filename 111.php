<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/18
 * Time: 23:48
 */
include('input4.php');
//var_dump($_POST);//欲定义变量 get可以在网址上修改

$input =new input();
include('db4.php');
//$mysqli=new mysqli('localhost','root','root','db_messages');
//if($mysqli->connect_errno > 0 ){
//    echo"连接错误";
//    echo $mysqli->connect_error;
//    exit;
//}
//$mysqli->queery("SET NAMES UTF8");//防止在数据库里面乱码

$msg = $input->post('msg');
$user = $input->post('user');

if($msg==''){
    echo"请输入留言，不能是空的";
    exit;
}
if($user==''){
    echo"请输入用户名，不能为空";
    exit;
}
$t=time();
$sql="INSERT INTO `all_messages`(`ID`, `name`, `time`, `content`) VALUES ('','{$user}','{$t}','{$msg}')";
$is=$mysqli->query($sql);
if($is==true){
    header("Location:text4.php");
}
else{
    echo"插入失败";
}

//echo $msg;
//echo"<hr/>";
//echo "发布人:";
//echo $user;
?>