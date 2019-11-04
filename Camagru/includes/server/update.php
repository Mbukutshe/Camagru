<?php
    include_once '../../config/setup.php';
    if (isset($_POS['pd']))
    {
        $pass = $_SESSION['pass'];
        $name= $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $pref = $_SESSION['pref'];

        $passwd = trim($_POST['pass']);
        $username= trim($_POST['name']);
        $email = trim($_POST['mail']);
        $prefer = trim($_POST['pref']);

        if ($pass == $passwd && $name == $username && $mail == $email && $pref == $prefer)
        {
            header('location: ../../views/dashboard.php?err=uptodate');
        }
        if ($pass != $passwd)
        {
            header('location: ../../views/reset.php'); 
        }
        if ($email != $mail)
        {
            
        }
        if ($prefer != $pref)
        {

        }
    }
    header('location: ../../views/dashboard.php?err=success');
    $obj = null;
?>