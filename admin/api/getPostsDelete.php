<?php

    $ids = $_POST['ids'];

    // 导入文件
    require_once "tools/doSql.php";

    //去执行数据库
    $sql = "update posts set status = 'trashed' where id in ( $ids )";

    $res = my_zsg($sql);


    if($res){
        echo '{"code":10000,"msg":"ok" }';
    }else{
        echo '{ "code":10001,"msg":"fail" }';
    }
    