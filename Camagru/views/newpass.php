<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="../includes/css/mastyle.css"/>
</head>
<body>
<section class="section-login">
<form class="jumbotron-login" method = "POST" action = "../includes/server/newkey.php">
    <div  class="label-container">
        <label class="label-text"><h1>Create New Password</h1></label>
    </div>
    <div class = "form-container">
    <?php
        if (isset($_GET['err']))
        {
            if ($_GET['err'] == 'passmatch')
                echo '<label class="message-color">Passwords doesn\'t match.</label>';
            else if ($_GET['err'] == 'empty')
                echo '<label class="message-color">All fields are required.</label>';
            else if ($_GET['err'] == 'invamail')
                echo '<label class="message-color">No such email.</label>';
            else
            {
                echo '<label class="message-color">Error occured. Retry again.</label>';
            }
        }
        if(isset($_GET['id']) && isset($_GET['code']))
        {
            echo "<input type='text' style = 'display:none' name = 'id' value=".$_GET['id']." >
            <input type='text' style = 'display:none' name = 'code' value=".$_GET['code']." >";
        }
    ?> 
    <div  class="form-group">
       <label class="label-text label-color"></label>
        <input type="password" class="form-control" name = "pass" placeholder="new password..."/>
    </div>
    <div  class="form-group">
        <label class = "label-text label-color"></label>
        <input type="password" class="form-control" name = "cpass" placeholder="confirm password..."/>
    </div>
    <div class="form-group">
        <button  type="submit" class="btn-success" name="login">create</button><br/>
        <div class = "href-link">
        <label><a href = "signup.php">Don't have an account?</a></label>
        </div>
    </div>
    </div>
</form>
</section>
</body>
</html>
