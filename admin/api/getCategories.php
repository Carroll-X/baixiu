<?php
    //接受数据
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    //导入sql
    require_once 'tools/doSql.php';
    //准备sql语句;
    $sql = "insert into categories(slug,name) values('$slug','$name')";

    $res = my_zsg($sql);

    if($res){
        echo ' {"code":10000, "msg":"ok"}';
    }else{
        echo ' {"code":10001, "msg":"fail"}';
    }