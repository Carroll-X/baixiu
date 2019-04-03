<?php

    $id = $_GET['id'];

    require_once 'tools/doSql.php';

    $sql = "select p.id,u.nickname,p.title,p.content,p.slug,p.feature,c.name,p.created,p.status from posts p 
    inner join categories c
    on  p.category_id = c.id
    inner join users u
    on p.user_id = u.id
    where p.id = $id";
    $data = my_select($sql);

    echo json_encode($data[0]);