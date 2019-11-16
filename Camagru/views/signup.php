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
    <form class="jumbotron-login" method = "POST" action = "../includes/server/signup.php">
        <div  class="label-container">
            <label class="label-text"><h1>Sign Up</h1></label>
        </div>
        <div class = "form-container">
        <?php
        if (isset($_GET['err']))
        {
            if ($_GET['err'] == 'passmatch')
            {
                echo '<label class="message-color">Passwords doesn\'t match.</label>';
            }
            else if ($_GET['err'] == 'empty')
            {
                echo '<label class="message-color">All fields are required.</label>';
            }
            else if ($_GET['err'] == 'invamail')
            {
                echo '<label class="message-color">No such email.</label>';
            }
            else if ($_GET['err'] == 'exist')
            {
                echo '<label class="message-color">Username already exists.</label>';
            }
            else if ($_GET['err'] == 'mexist')
            {
                echo '<label class="message-color">E-mail Address already exists.</label>';
            }
            else
            {
                echo '<label class="message-color">Error occured. Retry again.</label>';
            }
        }
        ?> 
        <div  class="form-group">
            <label class="label-text label-color"></label>
            <input type="text" class="form-control" name = "user" placeholder="username..."/>
        </div>
        <div  class="form-group">
            <label class = "label-text label-color"></label>
            <input type="email" class="form-control" name = "email" placeholder="email address..."/>
        </div>
        <div  class="form-group">
            <label class = "label-text label-color"></label> 
            <input type="password" class="form-control" name = "pass1" placeholder="password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
        </div>
        <div  class="form-group">
            <label class = "label-text label-color"></label>
            <input type="password" class="form-control" name = "pass2" placeholder="confirm password..."pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
        </div>
        <div class="form-group">
            <button  type="submit" class="btn-success" name="signup">Create</button>
            <div class = "href-link">
            <label><a href = "login.php">Already have an account?</a></label>
        </div>
        </div>
        </div>
    </form>
</section>
</body>
</html>