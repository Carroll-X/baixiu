<?php

    $text = $_POST['text'];
    $link = $_POST['link'];

    //文件
    $image = $_FILES['image'];
    //获取文件临时路径
    $tmp_path = $image['tmp_name'];
    //文件名
    $old_name = $image['name'];
    //转格式文件名
    $new_name = iconv('utf-8','gbk',$old_name);
    //文件新路径
    $new_path = "../../uploads/$new_name";
    //移动文件
    move_uploaded_file($tmp_path,$new_path);

    $old_path =  "../../uploads/$old_name";
    //导入sql文件
    require_once 'tools/doSql.php';
    //准备sql语句
    $sql= "insert into sliders(text,link,image) values('$text','$link','$old_path')";

    $res = my_zsg($sql);

    if($res){
        echo '{ "code":10000, "msg":"ok" }';
    }else{
        echo '{ "code":10001, "msg":"fail" }';
    }
