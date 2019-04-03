<?php

    $id = $_POST['id'];

    require_once './tools/doSql.php';

    $sql = "select * from posts where id ='$id'";

    $data = my_select($sql);

    $likes = $data[0]['likes'];
    
    $likes++;

    $sql = "update posts set likes='$likes' where id ='$id'";

    $res = my_zsg($sql);

    if($res){
        echo $likes;
    }else{
        echo 'fail';
    }