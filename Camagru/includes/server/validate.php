<?php
    include_once '../config/setup.php';
    if (isset($_GET['email']) && isset($_GET['code']))
    {
        try
        {
            $email = $_GET['email'];
            $code = $_GET['code'];
            $sql = "UPDATE users SET account_confirmed = 'YES' WHERE email = ? AND confirmation_code = ?";
            $res = $obj->prepare($sql);
            $res->bindParam(1, $email);
            $res->bindParam(2, $code);
            $res->execute();
            if ($res->rowCount())
            {
                echo "Email verified.";
                header("location: ");
            }
            else
            {
                echo "Something went wrong.";
            }
        }
        catch(PDOException $ex)
        {
            echo "Error : ".$ex->getMessage();
        }
    }
?>