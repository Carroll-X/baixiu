<?php

    //开启session
    session_start();
    //获取用户密码
    $password = $_SESSION['info']['password'];
    //获取用户输出的老密码;
    $old_Pwd = $_POST['old'];

    //输入的密码和用户密码做判断
    if( $old_Pwd != $password ){
       echo '{ "code":10001, "msg":"密码核对失败" }';
       return;
    } 

    //获取用户输出的新密码;
    $new_Pwd = $_POST['password'];
    //获取当前用户id
    $id = $_SESSION['info']['id'];
    //导入sql文件
    require_once 'tools/doSql.php';
    //准备sql语句
    $sql = "update users set password='$new_Pwd' where id='$id'";

    $res = my_zsg($sql);

    if($res){
        echo '{ "code":10000, "msg":"修改成功" }';
    }else{
        echo '{ "code":10002, "msg":"修改失败" }';
    }
            
        