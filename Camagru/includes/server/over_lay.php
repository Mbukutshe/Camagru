<?php
include_once '../../config/setup.php';
session_start();
if (!isset($_SESSION['user_id']))
{
   header('location: ../../index.php');
}
$filteredData = str_replace("data:image/png;base64,", "", $_POST['name-img']);
$filteredData = str_replace(" ", "+", $filteredData);
$unencodedData=base64_decode($filteredData);
$name = $_SESSION['user_name'].time().'.png';
file_put_contents('../uploads/'.$name, $unencodedData);

function super_impose($src,$dest,$added)
{
    $base = imagecreatefrompng($src);
    $superpose= imagecreatefrompng($added);
    list($width, $height) = getimagesize($src);
    list($width_small, $height_small) = getimagesize($added);
    imagecopyresampled($base , $superpose,  0, 0, 0, 0, 100, 100,$width_small, $height_small);
    imagepng($base , $dest);
}
super_impose("../uploads/".$name,"../uploads/".$name,"../img/".$_POST['image']);
try
{
    $id = $_SESSION['user_id'];
    $img_dir = "../uploads/";
    $sql = "INSERT INTO images (image_name, image_path, id) VALUES(?, ?, ?)";
    $res = $obj->prepare($sql);
    $res->bindParam(1, $name);
    $res->bindParam(2, $img_dir);
    $res->bindParam(3, $id);
    $res->execute();
    if ($res->rowCount())
    {

    }
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
catch(PDOException $ex)
{
    echo "Error : ".$ex->getMessage();
}
$obj = NULL;
?>

