<?php
    include_once('../../config/setup.php');
    if (isset($_GET['id']) && isset($_GET['uni_code']))
    {
        $email = trim($_GET['id']);
        $code = trim($_GET['uni_code']);

        if (empty($email) || empty($code) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header('location: ../../views/reset.php');
        }
        else
        {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $confirm = 'YES';
                $sql = "SELECT * FROM users WHERE email = ? AND account_confirmed = ?";
                $stmt = $obj->prepare($sql);
                $stmt->bindParam(1, $email);
                $stmt->bindParam(2, $confirm);
                $stmt->execute();
                if ($stmt->rowCount())
                {
                    header('location: ../../views/newpass.php?id='.$email.'&code='.$code);
                }
                else
                {
                    header('location: confirm_email.php');
                }
            }
            else
            {
                echo "Email is inactive";
            }
            
        }
    }
    $obj = null;
?>