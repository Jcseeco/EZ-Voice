<!DOCTYPE html>
<html>
	<title><?php include('php/getTitle.php') ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/RecordRTC.js"></script>
	<script src="js/adapter-latest.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/jscript" src="js/jquery-3.3.1.js"></script>
	<script type="text/jscript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/render.js"></script>
	<script type="text/javascript" src="js/record.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	
	<style>
		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
	</style>
	
	
	
	<body onload="check()" class="w3-light-grey w3-content" style="max-width:1600px">
	
		<!-- Sidebar/menu -->
	  	<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;" id="mySidebar"><br>
			<div class="w3-container">
		    	<a onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu"><i class="fa fa-remove"></i></a>
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
		
			<!-- Header ver2-->
			<header id="portfolio">
				<a href="#"><img src="image/user.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
				<span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
				<div class="w3-container">
					<h1><b>ezEnglish</b></h1>
					<form class="w3-container w3-bottombar w3-padding-16 w3-margin-bottom" action="search.php" method="get">
						<div class="w3-col m10 l10">
							<input id="keyword" type="text" class="w3-input w3-border" name="s" placeholder="search...">
		   				</div>

						<div class="w3-col m2 l2">
							<button type="submit" class="w3-button w3-white w3-border" onclick="return searchKey()"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</header>
		  
			<div id="playVid" class="w3-center">
				<iframe id="thumbnail" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			
			<div id="sentence" style="margin:10px">
				<ul id="sentenceList" class="w3-ul w3-border w3-large"></ul>
			</div>
			
			<div id = "recordArea" style="display:none">
				<audio></audio>
				<button type="button" class="btn btn-outline-danger" id="btn-start-recording">Record</button>
				<button type="button" class="btn btn-outline-success" id="btn-stop-recording" disabled>Done</button><br>
				<span style="font-size:36px;font-weight:bold;" id="answerArea"></span>
			</div>
			
			<div class="w3-black w3-center w3-padding-24">Powered by WTLab109</div>
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
