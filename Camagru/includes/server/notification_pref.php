<?php
    include_once '../../config/setup.php';
    session_start();
    if (isset($_POST['pref']))
    {
        if (empty($_POST['pref']))
        {
            header('location: ../../views/dashboard.php?err=empty');
        }
        else if ($_POST['pref'] == $_SESSION['pref'])
        {
            header('location: ../../views/dashboard.php?err=uptodate');
        }
        else
        {
            try
            {
                $change = $_POST['pref'];
                if ($change === 'true')
                {
                    $change = 'YES';
                }
                else
                {
                    $change = 'NO';
                }
                $user_id = $_SESSION['user_id'];
                $sql = "UPDATE users SET receive_notifications = ? WHERE id = ?";
                $res = $obj->prepare($sql);
                $res->bindParam(1, $change);
                $res->bindParam(2, $user_id);
                $res->execute();
                if ($res->rowCount())
                {
                    $_SESSION['pref'] = "YES";
                    echo '<script type = "text/javascript">
                        pref = "'.$_SESSION['pref'].'";
                    </script>';
                    header('location: ../../views/dashboard.php?err=success');
                }
                else
                {
                    header('location: ../../views/dashboard.php?err=error&er='.$change);
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