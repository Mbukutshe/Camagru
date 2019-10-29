<?php
    include_once '../../config/setup.php';
    if (isset($_POST['login']))
    {
        $user = $_POST['user'];
        $f_pass = $_POST['pass'];
        if (empty($user)||empty($f_pass))
        {
            echo "All fields are required!";
            header('location: ../../views/login.php');
        }
        else
        {
            try
            {
                $code = 'YES';
                $user_key = hash('md5', $f_pass, FALSE);
                $sql = "SELECT * users WHERE username = ? OR email = ? AND user_key = ? AND account_confirmed = ?";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $user);
                $res->bindParam(2, $user);
                $res->bindParam(3, $user_key);
                $res->bindParam(4, $code);
                $res->execute();
                if ($res->rowCount())
                {
                    echo "Perfectly";
                    header("location: ../../views/home.php");
                }
                else
                    {
                        echo "Something went wrong";
                    }
            }
            catch(PDOException $ex)
            {
                echo "Error : ".$ex->getMessage();
            }
        }
    }
?>