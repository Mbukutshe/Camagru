<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<script type = 'text/javascript'>window.localStorage.removeItem('clicked');</script>";
    header('location: ../../index.php');
?>