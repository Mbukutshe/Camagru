<?php
    session_start();
    include_once '../../config/setup.php';
    include_once '../declarations/constants.php';
    if (!isset($_SESSION['user_id']))
    {
       header('location: ../../index.php');
    }
    else if(isset($_POST['read']))
    {
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
    }
?>