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
    <div  class="form-group">
        <label class="label-text">Username or Email</label>
        <input type="text" class="form-control" name = "user"/>
    </div>
    <div  class="form-group">
        <label class = "label-text">Password</label>
        <input type="password" class="form-control" name = "pass"/>
    </div>
    <div class="form-group">
        <button  type="submit" class="btn-success" name="login">Login</button><br/>
        <label><a href = "forgot.php">forgot password?</a></label><br/>
        <label><a href = "signup.php">Don't have an account?</a></label>
    </div>
</form>
</section>
</body>
</html>
