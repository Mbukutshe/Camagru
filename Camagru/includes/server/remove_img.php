<?php
    include_once '../../config/setup.php';
    session_start();
    if (!isset($_SESSION['user_id']))
    {
       header('location: ../../index.php');
    }
    if (isset($_POST['remove']))
    {
        $name = $_POST['image'];
        $id = $_SESSION['user_id'];
        $img_dir = "../uploads/".$_POST['image'];
        
        if (is_file($img_dir))
        {
            try
            {
                unlink($img_dir);
                $sql = "SET FOREIGN_KEY_CHECKS=0";
                $res = $obj->prepare($sql);
                $res->execute();
                $sql = "DELETE FROM images WHERE image_name = ? AND id = ?";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $name);
                $res->bindParam(2, $id);
                $res->execute();
            }
            catch(PDOException $ex)
            {
                echo "Error : ".$ex->getMessage();
            }
        }
    }
?>