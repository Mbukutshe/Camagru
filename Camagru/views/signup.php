<?php
 require_once 'nav.php';
?>
        <form class="jumbotron" method = "POST" action = "../includes/server/signup.php">
            <div  class="form-group">
                <label class="label-text">Username</label>
                <input type="text" class="form-control" name = "user"/>
            </div>
            <div  class="form-group">
                <label class = "label-text">Email Adress</label>
                <input type="email" class="form-control" name = "email"/>
            </div>
            <div  class="form-group">
                <label class = "label-text">Password</label>
                <input type="password" class="form-control" name = "pass1"/>
            </div>
            <div  class="form-group">
                <label class = "label-text">Confirm Password</label>
                <input type="password" class="form-control" name = "pass2"/>
            </div>
            <div class="form-group">
                <button  type="submit" class="btn-success" name="signup">SignUp</button><br/>
                <label><a href = "login.php">Already have an account?</a></label>
            </div>
        </form>
<?php
 require_once 'footer.php';
?>