<?php
    include_once 'config/database.php';
    try
    {
        $MYSQL = $MYSQL.';dbname=camagru';
        $obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
        $obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $code = hash('md5', rand(10,100000), false);
        $username = "tamike";
        $user_key = hash('md5', "Khanyisa18", false);;
        $confirmed = "YES";
        $email = "wisemanmbukutshe@gmail.com";
        $sql = "SELECT * FROM users";
        $stmt1 = $obj->prepare($sql);
        $stmt1->execute();
        $sql = "SELECT * FROM images";
        $stmt2 = $obj->prepare($sql);
        $stmt2->execute();
        if (!($stmt1->rowCount()))
        {

            $sql = "INSERT INTO users (username, user_key, email, account_confirmed, confirmation_code)
                    VALUES(?, ?, ?, ?, ?)";
            $stmt = $obj->prepare($sql);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $user_key);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $confirmed);
            $stmt->bindParam(5, $code);
            $stmt->execute();
            if ($stmt->rowCount())
            {
                $sql = "SELECT id FROM users WHERE username = ? AND email = ? ORDER BY id DESC";
                $stmt = $obj->prepare($sql);
                $stmt->bindParam(1, $username);
                $stmt->bindParam(2, $email);
                $stmt->execute();
                if ($stmt->rowCount())
                {
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $res = $stmt->fetch();
                    $user_id = $res['id'];
                    $path = "../uploads/";
                    $i = 0;
                    while (++$i <= 4)
                    {
                        $image_name = "sticker".$i.".png";
                        $sql = "INSERT INTO images (image_name, image_path, id) VALUES (?, ?, ?)";
                        $stmt = $obj->prepare($sql);
                        $stmt->bindParam(1, $image_name);
                        $stmt->bindParam(2, $path);
                        $stmt->bindParam(3, $user_id);
                        $stmt->execute();
                        $stmt = null;
                    }
                    $sql = "SELECT image_id FROM images";
                    $stmt = $obj->prepare($sql);
                    $stmt->execute();
                    if ($stmt->rowCount())
                    {
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while($res = $stmt->fetch())
                        {
                            $image_id = $res['image_id'];
                            $sql = "INSERT INTO likes (image_id, id) VALUES (?, ?)";
                            $stmt1 = $obj->prepare($sql);
                            $stmt1->bindParam(1, $image_id);
                            $stmt1->bindParam(2, $user_id);
                            $stmt1->execute();
                            $stmt1 = null;
                        }
                    }
                }
            }
        }
    }
    catch(PDOException $ex)
    {
        echo "Error : ".$ex->getMessage();
    }
?>