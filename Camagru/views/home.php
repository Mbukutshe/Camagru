<?php
 include_once 'nav.php';
 include_once 'config/setup.php';
?>
    <div class="pagination">
 <!--   page: <span id="page"></span>-->
        <a href = "#" id = "btn_prev">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#" >2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href = "#" id = "btn_next">&raquo;</a>
    </div>
    <div class="gallery-main">
        <ul id = "gallery-list"> 
        </ul>
    </div>
<?php
    require_once 'footer.php';
?>