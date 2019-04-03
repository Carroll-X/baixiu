<?php

    require_once './tools/doSql.php';

    $ids = $_POST['ids'];

    $sql = "select id,status from comments where id in ($ids)";
    
    $data = my_select($sql);

    echo json_encode($data);
 