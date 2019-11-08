<?php
  require_once 'nav.php';
?>
  <div class = "main">
    <div class = "superposable">
      <label class = "head-sections">Stickers</label>
      <ul class = "side-ul">
        <li class="side-li" id = "icon1"><img src="../includes/img/sticker1.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon2"><img src="../includes/img/grass.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon3"><img src="../includes/img/sticker2.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon4"><img src="../includes/img/sticker3.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon5"><img src="../includes/img/tree.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon6"><img src="../includes/img/sticker4.png" width="50" height="50"/></li>
        <li class="side-li" id = "icon7"><img src="../includes/img/sticker5.png" width="50" height="50"/></li>
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
            <label>Camera is not supported. Check the camera settings or Pick an Image instead</label>
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
    <!-- <?php
        $img_dir = "../includes/uploads/";
        $images = scandir($img_dir);
        $html = "";
        $html = "<ul id = 'taken-pics'>";
        foreach($images as $img) 	
        { 
          if($img === '.' || $img === '..') 
          {
            continue;
          } 		   
          if ((preg_match('/.jpg/',$img)) || (preg_match('/.png/',$img)))
          {				
            $html .="<li>
            <div style = '  width : 100%;
            height : 120;  display : inline-block;
            z-index : 10;
            padding-right : 2%;
            border : 1px solid #f5f7f6;
            border-radius : 5px;
            margin-top : 1%;
            margin-bottom : 2%;
            box-shadow : 0px 9px 8px 0px darkgrey;'>
            <img style='  width : 200;
            height : 120;
            z-index : 10;
            display : inline-block;
            float : left;
            border-right : 1px solid #f5f7f6;' src='".$img_dir.$img."'/>
            <img style='width : 8%;
            height : 8%;
            float : right;
            Left : 10%;
            margin-top : 30%;
            bottom : 0px;
            display : block;
            border : 1px solid yellow;' 
            src = '../includes/img/yes.png'/>
            <img style='width : 5%;
            height : 5%;
            float : right;
            top : 0px;
            right : 5%;
            margin-top : 1%;
            display : inline-block;
            border : 1px solid red;'
            src='../includes/img/delete.png'/>
            </div>
            </li>";
          } 
          else 
          { 
            continue; 
          }	
        } 
        $html .="</ul>" ; 
        echo $html;
      ?>--></ul>
    </div>
  </div>
<?php
  require_once 'footer.php';
?>