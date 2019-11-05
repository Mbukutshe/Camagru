<?php
    include_once '../../config/setup.php';
    include_once '../declarations/constants.php';
    if (isset($_POST['signup']))
    {
        $user = trim($_POST['user']);
        $email = trim($_POST['email']);
        $f_pass = trim($_POST['pass1']);
        $sec_pass = trim($_POST['pass2']);
        if (empty($user)||empty($email)||empty($f_pass)||empty($sec_pass))
        {
            header('location: ../../views/signup.php?err=empty');
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header('location: ../../views/signup.php?err=invamail');            
        }
        else if ($f_pass != $sec_pass)
        {
            header('location: ../../views/signup.php?err=passmatch');
        }
        else
        {
            try
            {
                $code = hash('md5',rand(10, 10000), FALSE);
                $user_key = hash('md5', $f_pass, FALSE);
                $sql = "INSERT INTO users (username, email, user_key, confirmation_code) VALUES (?,?,?,?)";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $user);
                $res->bindParam(2, $email);
                $res->bindParam(3, $user_key);
                $res->bindParam(4, $code);
                $res->execute();
                if ($res->rowCount())
                {
                    $body = "http://localhost:8080/camagru/includes/server/validate.php?email=$email&code=$code";
                    if (mail($email,  $veri_subj, $body, $sender))
                        header("location: ../../views/login.php?err=success");
                    else
                        header("location: ../../views/signup.php?err=err");
                }
                else
                {
                    echo "Something went wrong";
                    header('location: ../../views/signup.php?err=error');
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