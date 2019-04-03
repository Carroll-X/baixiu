<?php

require_once 'tools/doSql.php';

$sql = "select * from sliders";

$data = my_select($sql);

echo json_encode($data);