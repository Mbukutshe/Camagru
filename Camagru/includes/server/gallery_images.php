<?php
    session_start();
    if(isset($_POST['gallery']))
    {
        $img_dir = "../uploads/";
        $array = [];
        $images = scandir($img_dir);
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