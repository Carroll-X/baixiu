<?php
    session_start();

    unset($_SESSION['info']);

    header('location:../login.html');
?>