<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/22
 * Time: 19:18
 */
date_default_timezone_set('PRC'); //东八时区 echo date('Y-m-d H:i:s');
//date_default_timezone_set()设置
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
$xm = $input->post('xm');
$con = $input->post('con');
$con_id=$input->get('ID');

if($con==''){
    echo"请输入留言，不能是空的";
    exit;
}
$t=time();
$sql="INSERT INTO `hui`(`id`, `xm`, `con`, `time`) VALUES ('','{$xm}','{$con}','{$t}')";

$is=$mysqli->query($sql);



if($is==true){

    header("Location:text4.php");
}
else{
    echo"回复失败";
}
?>
