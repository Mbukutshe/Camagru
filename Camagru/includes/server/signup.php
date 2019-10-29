<?php
    include_once '../../config/setup.php';
    include_once '../includes/declarations/constants.php';
    if (isset($_POST['signup']))
    {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $f_pass = $_POST['pass1'];
        $sec_pass = $_POST['pass2'];
        if (empty($user)||empty($email)||empty($f_pass)||empty($sec_pass))
        {
            echo "All fields are required!";
            header('location: ../../views/signup.php');
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Invalid email.";
            header('location: ../../views/signup.php');            
        }
        else if ($f_pass != $sec_pass)
        {
            echo "Passwords don't match.";
            header('location: ../../views/signup.php');
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
                    mail($email, $subject, "localhost:8080/camagru/includes/server/validate.php?email=$email&code=$code", $sender);
                    echo "Check your email for verification";
                    header("location: ../../views/login.php");
                }
                else
                    {
                        echo "Something went wrong";
                        header("location: ../../views/login.php");
                    }
            }
            catch(PDOException $ex)
            {
                echo "Error : ".$ex->getMessage();
            }
        }
    }
?>