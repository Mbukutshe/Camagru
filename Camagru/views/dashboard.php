<?php
 require_once 'nav.php';
 include_once '../config/setup.php';
 if (!isset($_SESSION['user_id']))
 {
    header('location: ../index.php');
 }
?>
    <?php
    if (isset($_GET['err']))
    {
        if ($_GET['err'] == 'empty')
        {
            echo '<label class="message-color">Come on! nothing entered.</label>'; 
        }
        else if ($_GET['err'] == 'success')
        {
            echo '<script type = "text/javascript">
                    pref = "'.$_SESSION['pref'].'";
                </script>';
            echo '<label class="message-green">Check the email to confirm changes.</label>';
        }
        else if ($_GET['err'] == 'error')
        {
            echo '<label class="message-color">Error occured. Please try again.</label>';
        }
        else if ($_GET['err'] == 'uptodate')
        {
            echo '<label class="message-green">Details are up to date.</label>';
        }
        else if ($_GET['err'] == 'invamail')
        {
            echo '<label class="message-color">No such email.</label>';
        }
    }
    ?> 
    <div class = "dash-container">
    <div class="dash-main">
    <form id = 'update-form' class="dash-form-container" method = 'POST' action = '../includes/server/update.php'>
        <div class="row">
            <div id = "div1" class="column">
            </div>
            <div id = "div2" class="column">
            </div>
            <div id = "div3" class="column">
            </div>
        </div>
        <div class="row">
            <div id = "div4" class="column">
            </div>
            <div id = "div5" class="column">
            </div>
        </div>
        <div>
        <div class="update_button">
            <label id = 'text-uplabel'></label>
            <input id='text-upd' type="input" class="form-control" value=""/>
            <label id = 'not-label'>Receive Notifications ? :</label><input id='text-check' type="checkbox" class="form-control"/>
        </div>
        <div class="update_button">
            <button id = "changes"  type="submit" class="btn-success" name="upd">Save Changes</button>
        </div>
        <div>
    </form>
    </div>
    <script type='text/javascript'>
        var userName = "<?php if (isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?>";
        var emailAddress = "<?php if (isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?>";
        var pref = "<?php if (isset($_SESSION['pref'])){echo $_SESSION['pref'];}?>";
    </script>
<?php
    require_once 'footer.php';
?>