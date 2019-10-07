<!DOCTYPE html>
<html>
<title>ezEnglish#search</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/jscript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body onload="check()" class="w3-light-grey w3-content" style="max-width:1600px">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;" id="mySidebar"><br>
      <div class="w3-container">
          <a onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
              <i class="fa fa-remove"></i>
          </a>
          <img src="image/user.jpg" style="width:45%;" class="w3-round"><br><br>
          <h4><b>user</b></h4>
      </div>
      <div class="w3-bar-block">
          <a href="home.html" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>首頁</a>
          <a href="login.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>登入</a>
      </div>
  </nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px">

  <!-- search Header -->
  <header id="portfolio">
    <a href="#"><img src="image/user.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <h1><b>ezEnglish</b></h1>

      <!-- search bar -->
      <form class="w3-container" action="search.php" method="get">
        <div class="w3-col m10 l10">
          <input id="keyword" type="text" class="w3-input w3-border" name="s" placeholder="search..." value=<?php echo "\"" . $_GET['s'] . "\""?>>
        </div>
        <div class="w3-col m2 l2">
          <button type="submit" class="w3-button w3-white w3-border" onclick="return searchKey()"><i class="fa fa-search"></i></button>
        </div>
      </form>

      <div class="w3-section w3-bottombar w3-padding-16">
        <span class="w3-margin-right">Filter:</span>
        <button class="w3-button w3-black">ALL</button>
        <button class="w3-button w3-white" onclick="toggleFilt(this)">movie</button>
        <button class="w3-button w3-white" onclick="toggleFilt(this)">Animation</button>
        <span>
          <select class="w3-select w3-border-0" id="sortMethod" style="width: 20%">
            <option value="relevant" selected><button>most relevant</button></option>
            <option value="date desc"><button>by date desc -</button></option>
            <option value="date asc"><button>by date asc +</button></option>
          </select>
        </span>
      </div>
    </div>
  </header>

  <div class="w3-container">
    <ul id="search_result" class="w3-ul"></ul>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
