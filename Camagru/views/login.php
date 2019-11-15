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
<form class="jumbotron-login" method = "POST" action = "../includes/server/login.php">
    <div  class="label-container">
        <label class="label-text"><h1>Sign In</h1></label>
    </div>
    <div class = "form-container">
    <?php
    if (isset($_GET['err']))
    {
        if ($_GET['err'] == 'noexist')
            echo '<label class="message-color">Incorrect credentials.</label>';
        else if ($_GET['err'] == 'empty')
        {
            echo '<label class="message-color">All fields are required.</label>';
        }
        else if ($_GET['err'] == 'success')
        {
            echo '<label class="message-green">Check your email for verification.</label>';
        }
    }
    ?> 
    <div  class="form-group">
       <label class="label-text label-color"></label>
        <input type="text" class="form-control" name = "user" placeholder="username or email..."/>
    </div>
    <div  class="form-group">
        <label class = "label-text label-color"></label>
        <input type="password" class="form-control" name = "pass" placeholder="password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
    </div>
    <div class="form-group">
        <button  type="submit" class="btn-success" name="login">Login</button><br/>
        <div class = "href-link">
        <label><a href = "reset.php">forgot password?</a></label>
        </div>
        <div class = "href-link">
        <label><a href = "signup.php">Don't have an account?</a></label>
        </div>
    </div>
    </div>
</form>
</section>
</body>
</html>
