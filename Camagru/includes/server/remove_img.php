<?php
    session_start();
    $img_dir = "../uploads/".$_POST['image'];
    
    if (is_file($img_dir))
    {
        unlink($filepath);
    }
?>