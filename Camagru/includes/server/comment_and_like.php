<?php
    session_start();
    include_once '../../config/setup.php';
    include_once '../declarations/constants.php';
    if (isset($_POST['read_comments']) && isset($_POST['img_id']))
    {
        try
        {
            $img_id = trim($_POST['img_id']);
            $sql = "SELECT comment, image_id FROM comments WHERE image_id = ?  ORDER BY comment_id DESC";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $img_id);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $array = [];
                while($comment = $stmt->fetch())
                {
                    $array[] = $comment;
                }
                echo json_encode($array);
            }
        }
        catch(PDOException $ex)
        {
            echo "Error : ".$ex->getMessage();
        }
    }
    else if (isset($_POST['insert_comments']) && isset($_POST['img_id']) && isset($_POST['user_id']) && isset($_POST['comment']))
    {
        try
        {
            $comment = trim($_POST['comment']); 
            $img_id = trim($_POST['img_id']);
            $user_id = trim($_POST['user_id']); 
            $sql = "INSERT INTO comments(comment, image_id, id) VALUES (?, ?, ?)";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $comment);
            $stmt->bindParam(2, $img_id);
            $stmt->bindParam(3, $user_id);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $notify = "YES";
                $sql = "SELECT * FROM users WHERE id = ? AND receive_notifications = ?";
                $stmt = $obj->prepare($sql);
                $stmt->bindParam(1, $user_id);
                $stmt->bindParam(2, $notify);
                $stmt->execute();
                if ($stmt->rowCount())
                {
                    $body = "Someone just commented on your picture.";
                    mail($_SESSION['user_email'], "Picture Comment", $body, $sender);
                }
                $sql = "SELECT * FROM comments WHERE image_id = ? ORDER BY comment_id DESC";
                $stmt = $obj->prepare($sql);
                $stmt->bindParam(1, $img_id);
                $stmt->execute();
                if ($stmt->rowCount())
                {
                    $array = [];
                    foreach($stmt as $comment)
                    {
                        $array[] = $comment;
                    }
                    echo json_encode($array);
                }
            }
        }
        catch(PDOException $ex)
        {
            echo "Error : ".$ex->getMessage();
        }
    }
    else if (isset($_POST['like']) && isset($_POST['img_id']) && isset($_POST['user_id']))
    {
        try
        {
            $img_id = trim($_POST['img_id']);
            $sql = "SELECT * FROM likes WHERE image_id = ?";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $img_id);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $res = $stmt->fetch();
                $like_no = $res['like_no'] + 1;
                $like_id = $res['like_id'];
                $user_id = $res['id']; 
                $sql = "UPDATE likes SET like_no = ? WHERE like_id = ?";
                $stmt = $obj->prepare($sql);
                $stmt->bindParam(1, $like_no);
                $stmt->bindParam(2, $like_id);
                $stmt->execute();
                if ($stmt->rowCount())
                {
                    $notify = "YES";
                    $sql = "SELECT * FROM users WHERE id = ? AND receive_notifications = ?";
                    $stmt = $obj->prepare($sql);
                    $stmt->bindParam(1, $user_id);
                    $stmt->bindParam(2, $notify);
                    $stmt->execute();
                    if ($stmt->rowCount())
                    {
                        $body = "Someone just liked your picture.";
                        mail($_SESSION['user_email'], "Picture Liked", $body, $sender);
                    }
                    echo "success";
                }
            }
        }
        catch(PDOException $ex)
        {
            echo "Error : ".$ex->getMessage();
        }
    } 
?>