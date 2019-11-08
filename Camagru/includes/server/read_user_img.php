<?php
    session_start();
    $img_dir = "../uploads/";
    $array = [];
    $images = scandir($img_dir);
    $images = preg_grep('~^'.$_SESSION['user_name'].'.*\.png$~', $images);
    foreach($images as $img) 	
    { 
        if($img === '.' || $img === '..') 
        {
            continue;
        } 		   
        if (preg_match('/.png/',$img))
        {				
            $array[] = $img;
        } 
        else 
        { 
            continue; 
        }	
    } 
    echo json_encode($array);
?>