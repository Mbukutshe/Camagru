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
<form class="jumbotron-login" method = "POST" action = "../includes/server/reset.php">
    <div  class="label-container">
        <label class="label-text"><h1>Reset</h1></label>
    </div>
    <div class = "form-container">
    <?php 
    if (isset($_GET['err']))
    {
        if ($_GET['err'] == 'noexist' || $_GET['err'] == 'invamail')
            echo '<label class="message-color">No such email.</label>';
        else if ($_GET['err'] == 'empty')
            echo '<label class="message-color">Field is required.</label>';
        else if ($_GET['err'] == 'success')
            echo '<label class="message-green">Please check the link sent to your email.</label>';
        else
        {
            echo '<label class="message-color">Error occured. Retry again.</label>';
        }
    }
    ?> 
    <div  class="form-group">
        <label class="label-text label-color"></label>
        <input type="email" class="form-control" name = "user" placeholder="email address..."/>
    </div>
    <div class="form-group">
        <button  type="submit" class="btn-success" name="reset">Send</button><br/>
        <div class = "href-link">
            <label><a href = "login.php">Already have an account?</a></label>
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