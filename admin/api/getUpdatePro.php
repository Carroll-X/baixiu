<?php
    //开启session
    session_start();

    $id = $_SESSION['info']['id'];
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];

    //判断是否修改头像
    if(!empty($_FILES['avatar']['tmp_name'])){
        //获取文件
        $avatar = $_FILES['avatar'];
        //获取文件名
        $old_name = $avatar['name'];
        //获取临时路径
        $tmp_path = $avatar['tmp_name'];
        //转文件名的格式
        $new_name = iconv('utf-8','gbk',$old_name);
        //新路径
        $new_path = "../../uploads/$new_name";
        //移动文件
        move_uploaded_file($tmp_path,$new_path);
        //老路径名
        $old_path = "../../uploads/$old_name";
    }
    //导入文件
        require_once 'tools/doSql.php';

        if(!empty($_FILES['avatar']['tmp_name'])){
            $sql = "update users set 
                            slug='$slug',
                            nickname='$nickname',
                            bio='$bio',
                            avatar='$old_path'
                        where id='$id'";
        }else{
            $sql = "update users set 
                            slug='$slug',
                            nickname='$nickname',
                            bio='$bio'
                        where id='$id'";
        }
      
        $res = my_zsg($sql);

        if($res){
            $_SESSION['info']['slug'] = $slug;
            $_SESSION['info']['nickname'] = $nickname;
            $_SESSION['info']['bio'] = $bio;
            if(!empty($_FILES['avatar']['tmp_name'])){
                $_SESSION['info']['avatar'] = $old_path;
            } ;

            echo '{ "code":10000, "msg":"ok" }';
        }else{
            echo '{"code":10001,"msg":"fail" }';
        }
