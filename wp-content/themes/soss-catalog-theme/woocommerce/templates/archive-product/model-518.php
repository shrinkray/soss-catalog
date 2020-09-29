<!-- // 518 index -->
<div id="loadingScreen">
  <div id="loadingImage">
    <img src="assets/layout/loadingScreen.png" />
  </div>
  <div id="loadingBarContainer">
    <div id="loadingBar"></div>
    <div id="loadingTextContainer">
      <img src="assets/layout/info.png">
      <p id="loadingText">Loading, please wait...100%</p>
    </div>
  </div>
</div>
<div class="row no-gutters" id="container">
  <canvas id="builderCanvas"></canvas>
</div>
<div id="toolsContainer">
  <div class="tools dropdown-shadow" id="materialChange">
    <div class="image" id="chrome">
      <a href="#" onclick="materialChange(&quot;chrome&quot;)">
        <img src="assets/layout/chrome.png" />
        <div class="text">Satin Chrome</div>
      </a>
    </div>
    <div class="image dropdown-shadow" id="brass">
      <a href="#" onclick="materialChange(&quot;brass&quot;)">
        <img src="assets/layout/brass.png" />
        <div class="text">Satin Brass</div>
      </a>
    </div>
    <div class="image dropdown-shadow" id="nickel">
      <a href="#" onclick="materialChange(&quot;nickel&quot;)">
        <img src="assets/layout/nickel.png" />
        <div class="text">Satin Nickel</div>
      </a>
    </div>
    <div class="image dropdown-shadow" id="black">
      <a href="#" onclick="materialChange(&quot;black&quot;)">
        <img src="assets/layout/black.png" />
        <div class="text">Black E-Coat</div>
      </a>
    </div>
  </div>
  <div class="tools">
    <div class="image dropdown-shadow">
      <a href="#" onclick="woodBlockState()">
        <img id="woodImage" src="assets/layout/hide.png" />
        <div class="text" id="woodState">Hide Wood Blocks</div>
      </a>
    </div>
  </div>
  <div class="tools">
    <div class="image">
      <figure><button id="playAnimation" name="play" onclick="playAnimation()"></button></figure>
    </div>
    <div class="text"><a onclick="playAnimation()">Open/Close Animation</a></div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="babylon/dist/babylon.js"></script>
<script src="babylon/dist/loaders/babylonjs.loaders.min.js"></script>
<script src="scripts/bundle.js"></script>
<?php
