<?php
    include_once '../../config/setup.php';
    include_once '../declarations/constants.php';
    if (isset($_POST['reset']))
    {
        $email = trim($_POST['user']);

        if (empty($email))
        {
            header('location: ../../views/reset.php?err=empty');
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header('location: ../../views/reset.php?err=invamail');
        }
        else
        {
            try
            {
                $code = hash('md5', rand(10,100000), false);
                $sql = "SELECT * FROM users WHERE email = ?";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $email);
                $res->execute();
                if ($res->rowCount())
                {
                    $confirm = 'YES';
                    $sql = "SELECT * FROM users WHERE email = ? AND account_confirmed = ?";
                    $stmt = $obj->prepare($sql);
                    $stmt->bindParam(1, $email);
                    $stmt->bindParam(2, $confirm);
                    $stmt->execute();
                    if ($stmt->rowCount())
                    {
                        $sql = "UPDATE users SET confirmation_code = ? WHERE email = ? AND account_confirmed = ?";
                        $stm = $obj->prepare($sql);
                        $stm->bindParam(1, $code);
                        $stm->bindParam(2, $email);
                        $stm->bindParam(3, $confirm);
                        $stm->execute();
                        if($stm->rowCount())
                        {
                            $link = "http://localhost:8080/camagru/includes/server/newpass.php?id=$email&uni_code=$code";
                            mail($email, $reset_subj, $link, $sender);
                            header('location: ../../views/reset.php?err=success');
                        }
                        else
                        {
                            header('location: ../../views/reset.php?err=err');
                        }
                    }
                    else
                    {
                        header('location: confirm_email.php');
                    }
                }
                else
                {
                    header('location: ../../views/reset.php?err=noexist');
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