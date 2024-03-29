<?php
    include_once('../../config/setup.php');
    if (isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['id']) && isset($_POST['code']))
    {
        $pass = htmlspecialchars(trim($_POST['pass']));
        $cpass = htmlspecialchars(trim($_POST['cpass']));
        $email = htmlspecialchars(trim($_POST['id']));
        $code = htmlspecialchars(trim($_POST['code']));

        if (empty($pass) || empty($cpass) || empty($email) || empty($code))
        {
            header('location: ../../views/newpass.php?err=empty');
        } 
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header('location: ../../views/newpass.php?err=invamail');
        }
        else if ($pass != $cpass)
        {
            header('location: ../../views/newpass.php?err=passmatch');
        }
        else
        {
            $confirm = 'YES';
            $sql = "SELECT * FROM users WHERE email = ? AND account_confirmed = ?";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $confirm);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $pass = hash('md5', $pass, FALSE);
                $sql = "UPDATE users SET user_key = ? WHERE email = ? AND confirmation_code = ?";
                $res  = $obj->prepare($sql);
                $res->bindParam(1, $pass);
                $res->bindParam(2, $email);
                $res->bindParam(3, $code);
                $res->execute();
                if ($res->rowCount())
                {
                    session_start();
                    session_unset();
                    session_destroy();
                    header('location: ../../views/login.php');
                }
                else
                {
                    header('location: ../../views/reset.php');
                }
            }
            else
            {
                header('location: ../../views/reset.php');
            }
        }
    }
    $obj = null;
?>