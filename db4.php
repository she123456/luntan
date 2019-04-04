<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/19
 * Time: 23:58
 */
//$mysqli=new mysqli('localhost','root','root','db_messages');
//
//
//if($mysqli->connect_errno > 0 ){
//    echo"连接错误";
//    echo $mysqli->connect_error;
//    exit;
//}
//$sql="INSERT INTO `all_messages`(`ID`, `name`, `time`, `content`) VALUES ('','nbgjfjf','2018-06','sgdachsc')";
//$is=$mysqli->query($sql);
//if($is==true){
//   echo"插入成功！";
//}
//else{
//    echo"插入失败！";
//}


$mysqli=new mysqli(' ',' ',' ','db_messages');
if($mysqli->connect_errno > 0 ){
    echo"连接错误";
    echo $mysqli->connect_error;
    exit;
}
$mysqli->query("SET NAMES UTF8");//防止在数据库里面乱码

?>