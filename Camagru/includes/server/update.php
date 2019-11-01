<?php
    include_once '../../config/setup.php';
    if (isset($_POS['upd']))
    {
        $pass = $_SESSION['pass'];
        $name= $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $pref = $_SESSION['pref'];

        $passwd = $_POST['pass'];
        $username= $_POST['name'];
        $email = $_POST['mail'];
        $prefer = $_POST['pref'];

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
    $obj = null;
?>