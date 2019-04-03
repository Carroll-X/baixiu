<?php
    //获取数据
   $title = $_POST['title'];
   $content = $_POST['content'];
   $slug = $_POST['slug'];
   $created = $_POST['created'];
   $category = $_POST['category'];
   $status = $_POST['status'];

    //获取文件
    $feature = $_FILES['feature'];
    //获取文件临时路径
    $tmp_path = $feature['tmp_name'];
    //获取文件名
    $old_name = $feature['name'];
    //新文件名
    $new_name = iconv('utf-8','gbk',$old_name);
    //新路径
    $new_path = "../../uploads/$new_name";
    //移动文件
    move_uploaded_file($tmp_path,$new_path);
    //导入$sql文件
    require_once 'tools/doSql.php';
    //utf-8 路径
    $old_path = "../../uploads/$old_name";
    //开启session
    session_start();
    //获取用户信息的id
    $id =$_SESSION['info']['id'];
    //准备$sql语句
    $sql = "insert into posts(title,content,slug,feature,category_id,created,status,user_id) 
    values('$title','$content','$slug','$old_path','$category','$created','$status','$id')";

    $res = my_zsg($sql);

    if($res){
        echo '{ "code":10000, "msg":"ok" }';
    }else{
        echo '{ "code":10001, "msg":"fail" }';
    }


