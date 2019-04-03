<?php
    //接受数据
    $email = $_POST['email'];
    $password = $_POST['password'];
    //连接数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //执行$sql语句
    $sql = "select * from users where email = '$email' and password = '$password'";

    $res = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($res,1);

    mysqli_close($link);

    if(count($data) > 0){
        //登录成功
        echo '{ "code":10000,"msg":"ok"}';
        // 登录成功  开启session 给浏览器一把钥匙;
        session_start();
        // 给session 中存值  相当于在服务器中保险柜存入一个东西
        $_SESSION['info'] = $data[0];
    }else{
        //登录失败
        echo '{ "code":10001,"msg":"fail"}';
    }

?>