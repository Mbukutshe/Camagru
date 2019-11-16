<?php
 include_once 'nav.php';
 include_once '../config/setup.php';
?>
    <div class="gallery-main">
        <ul id = "gallery-list">
        </ul>
    </div>
    <script type = "text/javascript">
        var count = "<?php 
            $sql = "SELECT * FROM images";
            $res = $obj->prepare($sql);
            $res->execute();
            if ($res->rowCount())
                echo $res->rowCount();
        ?>";
    </script>
    <div class="pagination">
        <a href = "#" id = "btn_prev">&laquo;</a>
        <a href="#" id = "first_page" class="active">First</a>
        <a href="#" id = "last_page">Last</a>
        <a href = "#" id = "btn_next">&raquo;</a>
    </div>
    <div id="popUp" class="pop">
        <span class="close"><img src="../includes/img/close.png" width = "50px" height="50px"></span>
        <img class="popup-image" id="img01">
    </div>
    <div id="popUpcomment" class="popComment">
        <span id="close" class="close"><img src="../includes/img/close.png" width = "50px" height="50px"></span>
        <div class = "container-comment">
        <img class=".popup-com-image" id="img02" width = "50%" height = "100%"/>
            <div class = "comment-text">
                <div class = "comment-list">
                    <ul class = "comments">
                    </ul>
                </div>
                <div class = "comment-input">
                    <input type="text" id = "insert-comment" class="formc-control" name = "text-comment" placeholder="say something..."/>
                    <button  type="submit" id="send-comment" class="btn-send" name="login">send</button><br/>
                    <span id = "warning"><label>sign in first before commenting.<label></span>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>