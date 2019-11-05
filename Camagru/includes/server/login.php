<?php
    include_once '../../config/setup.php';
    if (isset($_POST['login']))
    {
        $user = trim($_POST['user']);
        $f_pass = trim($_POST['pass']);
        if (empty($user)||empty($f_pass))
        {
            header('location: ../../views/login.php?err=empty');
        }
        else
        {
            try
            {
                $code = 'YES';
                $user_key = hash('md5', $f_pass, FALSE);
                $sql = "SELECT * FROM users WHERE (username = ? OR email = ?) AND (user_key = ? AND account_confirmed = ?)";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $user);
                $res->bindParam(2, $user);
                $res->bindParam(3, $user_key);
                $res->bindParam(4, $code);
                $res->execute();
                if ($res->rowCount())
                {
                    session_start();
                    header("location: ../../views/home.php");
                    $res->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $res->fetch();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['username'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['confirmed'] = $row['account_confirmed'];
                    $_SESSION['pref'] = $row['receive_notifications'];
                }
                else
                {
                    header('location: ../../views/login.php?err=noexist');
                }
            }
            catch(PDOException $ex)
            {
                echo "Error : ".$ex->getMessage();
            }
        }
    }
    $obj = null;
?>