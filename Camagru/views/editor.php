<?php
  require_once 'nav.php';
?>
  <div class = "main">
    <div class = "superposable">
      <label class = "head-sections">Superposable</label>
      <ul class = "side-ul">
        <li class="side-li" id = "icon1"><img src="../includes/img/tree.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon2"><img src="../includes/img/grass.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon3"><img src="../includes/img/feather.jpeg" width="50" height="50"/></li>
        <li class="side-li" id = "icon4"><img src="../includes/img/bird.jpg" width="50" height="50"/></li>
        <li class="side-li" id = "icon5"><img src="../includes/img/tree.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon6"><img src="../includes/img/grass.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon7"><img src="../includes/img/border.jpg" width="50" height="50"/></li>
        <li class="side-li" id = "icon8"><img src="../includes/img/bird.jpg" width="50" height="50"/></li>
        <li class="side-li" id = "icon9"><img src="../includes/img/feather.jpeg" width="50" height="50"/></li>
      </ul>
    </div>
    <div class = "preview-outer">
      <label class = "head-sections">Preview</label>
      <div class = "preview-pane">
        <div class = "video-div">
          <video id="player" autoplay = "true"></video>
          <div class="from-pc">
            <img id="image" src="../includes/img/tree.png"/>
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
            <label>Camera is not supported. Check the camera settings or Pick an Image instead</label>
          </div>
          <input type="file" accept="image/*" class= "button" id="image-picker"/>
        </div>
      </div>
    </div>
  </div>
  <div class = "side-section">
  <label class = "head-sections">My Pictures</label>
    <div id="newImages">
    </div>
   <div class="captured-pic">
        <ul id = "taken-pics">
        </ul>
    </div>
  </div>
<?php
  require_once 'footer.php';
?>