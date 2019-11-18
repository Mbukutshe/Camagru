<?php
    include_once '../../config/setup.php';
    session_start();
    if (!isset($_SESSION['user_id']))
    {
       header('location: ../../index.php');
    }
    if (isset($_POST['upd']))
    {
        $name = htmlspecialchars(trim($_SESSION['user_name']));
        $mail = htmlspecialchars(trim($_SESSION['user_email']));

        $username = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));

        if (empty($name) || empty($username) || empty($mail) || empty($email))
        {
            header('location: ../../views/dashboard.php?err=empty');
        }
        else if ($name == $username && $mail == $email)
        {
            header('location: ../../views/dashboard.php?err=uptodate');
        }
        else if ($email != $mail)
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                header('location: ../../views/dashboard.php?err=invamail');
            else
            {
                try
                {
                    $sql = "UPDATE users SET email = ? WHERE id = ?";
                    $res = $obj->prepare($sql);
                    $res->bindParam(1, $email);
                    $res->bindParam(2, $_SESSION['user_id']);
                    $res->execute();
                    if ($res->rowCount())
                    {
                        header('location: sign_out.php');
                    }
                    else
                    {
                        header('location: ../../views/dashboard.php?err=error');
                    }
                }
                catch(PDOException $ex)
                {
                    echo "Error : ".$ex->getMessage();
                }
            }
        }
        else if ($username != $name)
        {
            try
            {
                $sql = "UPDATE users SET username = ? WHERE id = ?";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $username);
                $res->bindParam(2, $_SESSION['user_id']);
                $res->execute();
                if ($res->rowCount())
                {
                    header('location: sign_out.php');
                }
                else
                {
                    header('location: ../../views/dashboard.php?err=error');
                }
            }
            catch(PDOException $ex)
            {
                header('location: ../../views/dashboard.php?err=error');
            }
        }
    }
    $obj = null;
?>