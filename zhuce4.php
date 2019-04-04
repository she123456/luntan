<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/20
 * Time: 23:32
 */

if(isset($_POST['submit'])){
//var_dump($_POST);
//exit();
    include('input4.php');
//var_dump($_POST);//欲定义变量 get可以在网址上修改

    $input =new input();
    include('db4.php');

    $username = $input->post('username');
    $password = $input->post('password');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $password1=$_POST['password1'];
    $email=$_POST['email'];
    $age=(int)$_POST['age'];
    $yanzh=$_POST['yanzh'];
    $yanzh1=$_POST['yanzh1'];
//echo $username,'-',$password,'-',$password1,'-',$email,'-',$age ,'-',$yanzh,'-',$yanzh1;
    $char=$username{0};
    $ascii=ord($char);
//判断用户名是否正确


    $sql="INSERT INTO `adm`(`id`, `username`, `password`) VALUES ('','{$username}','{$password}')";
    $is=$mysqli->query($sql);
    if($is==true){
        if(($ascii>=97&&$ascii<=122)||($ascii>=65&&$ascii<=90)){
//判断长度是否符合规范
            $userLen=strlen($username);
            if($userLen>=5&&$userLen<=10){
//判断密码是否为空
                $pwdLen=strlen($password);
                if($pwdLen>0){
//判断两次密码是否一致
                    if($password===$password1){
//判断邮箱是否有@
                        if(strpos($email,'@')!==false){
//判断年龄是否正确
                            if($age>=1&&$age<=125){
//验证码是否一致
                                if($yanzh===$yanzh1){
                                    echo"ok,".$username."注册成功了!</br>";

                                    header("Location:text4.php");
//                                    echo "<a href='text1.php'>登录</a>";


                                }
                                else{
                                    echo"验证码不一致";
                                }
                            }
                            else{
                                echo"年龄不对吧？</br>";
                            }
                        }
                        else{
                            echo"{$email}邮箱格式不正确</br>";
                        }
                    }
                    else{
                        echo"两次密码不一致</br>";
                    }
                }
                else{
                    echo"密码不能为空</br>";
                }

            }
            else{
                echo"{$username}用户名长度不符合规范</br>";
            }
        }else{
            echo"{$username}用户名不符合规范</br>";
        }

//       header("Location:text1.php");
    }
    else{
        echo"插入失败";
    }

}

//使用随机的验证码输入验证码
$string='1234567890qwertyuiopljhgfdsazxcvbnmZXCVBNMLKJHGFDSAQWERTYUIOP';
$code='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
</head>
<body>
<form  method="post">
    <table border="1" cellpadding="0" cellspacing="0" bgcolor="	#C1FFC1" width="50%" height="300px" >
        <tr>
            <td align="right">用户名</td>
            <td><input type="text" name="username" id="" placeholder="用户名以字母开头"/></td>
        </tr>
        <tr>
            <td align="right">密码</td>
            <td><input type="password" name="password" id=""placeholder="密码不能是空的" /></td>
        </tr>
        <tr>
            <td align="right">确认密码</td>
            <td><input type="password" name="password1" id=""placeholder="两次密码要一致"  /></td>
        </tr>
        <tr>
            <td align="right">邮箱</td>
            <td><input type="email" name="email" id=""placeholder="邮箱要有@" /></td>
        </tr>
        <tr>
            <td align="right">年龄</td>
            <td><input type="number" name="age" id="" placeholder="年龄1-125" /></td>
        </tr>
        <tr>
            <td align="right">验证码</td>
            <td><input type="text" name="yanzh" id="" /><?php echo$code;?>
                <input type="hidden" name="yanzh1" value='<?php echo strip_tags($code);?>'/>
            </td>
        </tr>
        <tr>
            <td colspan="2"align="right"><input type="submit"  name="submit" value="注册" /></td>
        </tr>
    </table>
</form>
</body>
</html>