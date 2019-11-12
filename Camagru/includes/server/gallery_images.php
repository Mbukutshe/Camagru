<?php
    include_once '../../config/setup.php';
    if(isset($_POST['gallery']))
    {
        $img_dir = "../uploads/";
        $array = [];
        $images = scandir($img_dir);
        try
        {
            $sql = "SELECT image_name,image_id FROM images ORDER BY upload_date DESC";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $img_id);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                while($img = $stmt->fetch()) 	
                { 
                    if($img['image_name'] === '.' || $img['image_name'] === '..') 
                    {
                        continue;
                    } 		   
                    if (preg_match('/.png/',$img['image_name']))
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
        }
        catch(PDOException $ex)
        {
            echo "Error : ".$ex->getMessage();
        }
    }
?>