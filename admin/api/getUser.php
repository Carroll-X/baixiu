<?php

    require_once 'tools/doSql.php';

    $sql = "select * from users order by id asc";

    $data = my_select($sql);

    echo json_encode($data);