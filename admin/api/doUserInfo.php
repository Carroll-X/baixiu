<?php
    session_start();

    $res = $_SESSION['info'];

    echo json_encode($res) ;

?>