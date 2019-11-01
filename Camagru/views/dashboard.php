<?php
 require_once 'nav.php';
 include_once '../config/setup.php';
?>
    <div class = "dash-container">
        <div class="dash-main">
            <div class="row">
                <div id = "div1" class="column">
                </div>
                <div id = "div2" class="column">
                </div>
            </div>
            <div class="row">
                <div id = "div3" class="column">
                </div>
                <div id = "div4" class="column">
                </div>
            </div>
        </div>
        <div class="update_button">
            <button  type="submit" class="btn-success" name="upd">Save Changes</button>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>