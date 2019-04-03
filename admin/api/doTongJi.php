<?php

    require_once './tools/doSql.php';
    //文章总数 除去别删除的
    $sql = "select * from posts where status !='trashed'";
    $wenZhang = count(my_select($sql));
    //文章草稿数
    $sql = "select * from posts where status ='drafted'";
    $caoGao = count(my_select($sql));

    //分类
    $sql = "select * from categories";
    $fenLei = count(my_select($sql));

    //评论数
    $sql = "select * from comments where status !='trashed'";
    $pinLun = count(my_select($sql));

    //审核评论数
    $sql = "select * from comments where status ='held'";
    $shenHe = count(my_select($sql));

    $arr = array(
        'wenzhang'=> $wenZhang,
        'caogao'=> $caoGao,
        'fenlei'=> $fenLei,
        'pinlun'=> $pinLun,
        'shenhe'=> $shenHe
    );

    echo json_encode($arr);

?>