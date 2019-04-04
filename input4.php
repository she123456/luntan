<?php
/**
 * Created by PhpStorm.
 * User: she
 * Date: 2019/3/19
 * Time: 23:17
 */
class input{
    function __construct()
    {
    }

    function post($key){

        if(isset($_POST[$key])==false){
            return false;
        }


        $val=$_POST[$key];
        //if($val=='')//防止一些恶意伤害
        //{
        //    echo'';
        // }
        return $val;
    }
    function get($key){

        if(isset($_GET[$key])==false){
            return false;
        }
        $val=$_GET[$key];
        //if($val=='')//防止一些恶意伤害
        //{
        //    echo'';
        // }
        return $val;
    }

}
?>