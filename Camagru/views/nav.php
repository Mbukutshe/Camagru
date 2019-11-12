<!doctype html>
<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="../includes/css/mastyle.css"/>
    <link rel="stylesheet" type="text/css" href="../includes/css/style.css"/>
</head>
<body>
<section class="section">
    <nav class = "top-menu">
        <div class="logo">
            <img id="logo-icon" src = "../includes/img/logo.png" width = "120px" height = "120px"/>
        </div>
        <div class = "navigation">
            <ul class = "nav-ul"> 
                <li id="home" class= "nav-item">Gallery</li>
                <?php if (isset($_SESSION['user_id']))echo '<li id = "settings" class= "nav-item"><a class= "sign" href="dashboard.php">Settings</a></li>'?>
                <?php if (isset($_SESSION['user_id']))echo '<li id = "signout" class= "nav-item"><a  class = "out-btn" href = "../includes/server/sign_out.php"><span>Sign Out</span></a></li>' ?>
                <?php if (!isset($_SESSION['user_id']))echo '<li id="getin" class= "nav-item"><a class = "sign-btn" href = "login.php"><span id="in">Sign In</span></a></li>'?>
            </ul>
        </div>
        <input type="hidden" id = "user_id" value = "<?php if (isset($_SESSION['user_id'])) echo $_SESSION['user_id'];?>"/>
    </nav>
    <div class = "container">