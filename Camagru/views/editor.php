<?php
  require_once 'nav.php';
  if (!isset($_SESSION['user_id']))
  {
     header('location: ../index.php');
  }
?>
  <div class = "main">
    <div class = "superposable">
      <label class = "head-sections">Stickers</label>
      <ul class = "side-ul">
      <li class="side-li" id = "icon1"><img width="50" height="50"/></li>
        <li class="side-li" id = "icon2"><img src="../includes/img/grass.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon4"><img src="../includes/img/sticker3.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon5"><img src="../includes/img/tree.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon8"><img src="../includes/img/sticker6.png" width="50" height="50"/></li>
      </ul>
    </div>
    <div class = "preview-outer">
      <label class = "head-sections">Preview</label>
      <div class = "preview-pane">
        <div class = "video-div">
          <video id="player" autoplay = "true"></video>
          <canvas id="canvas" width="320px" height="240px" style = "display:none;"></canvas>
          <div class="from-pc">
            <img id="image"/>
          </div>
          <div class = "to-edit">
              <img id = "superpose"/>
            </div>
        </div>
        <div class = "capture-button">
          <button type="button" class= "button" id="capture-btn"><img src="../includes/img/capture.png" width="50" height="50"></button>
        </div>
        <div id="pick-image">
          <div>
            <label id = "sticker-selection"></label>
          </div>
          <input type="file" accept="image/*" class= "button" id="image-picker"/>
        </div>
      </div>
    </div>
  </div>
  <div class = "side-section">
  <label class = "head-sections">My Pictures</label>
   <div class="captured-pic">
    <ul id = 'taken-pics'>
    </ul>
   </div>
  </div>
  <div id="popUp" class="pop">
    <span class="close"><img src="../includes/img/close.png" width = "50px" height="50px"></span>
    <img class="popup-image" id="img01">
  </div>
<?php
  require_once 'footer.php';
?>