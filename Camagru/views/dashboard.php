<?php
 require_once 'nav.php';
 include_once '../config/setup.php';
?>
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
            echo '<label class="message-green">Updated Successfully</label>';
        }
    }
    ?> 
    <div class = "dash-container">
    <div class="dash-main">
    <form class="dash-form-container" method = 'POST' action = '../includes/server/update.php'>
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
            <label>Receive Notifications ? :</label>
            <input id='text-check' type="checkbox" class="form-control"/>
        </div>
        <div class="update_button">
            <button id = 'changes'  type="submit" class="btn-success" name="upd">Save Changes</button>
        </div>
        <div>
    </form>
    </div>
<?php
    require_once 'footer.php';
?>