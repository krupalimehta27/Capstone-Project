<?php
$API_Key = 'AIzaSyCz-aaQxbpuegU4cE_7YhH5w8ZU8-HIOMU';
$channelID = 'UCHJDqsdYIHcOYr1-ksM8OwQ';
// $videoID ='oDjDAPgR6R0';
$maxResults = 4;

$apiError = 'video not found!';
try{
    $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='
    .$channelID.'&maxResults='.$maxResults.'&key='.$API_Key.''); 
    if($apiData){
        $videoList =json_decode($apiData);
    }else{
        throw new Exception('Invalid API key or channelID.');
    }
    }catch(Exception $e){
        $apiError =$e->getMessage();
    }
?>



<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <title>You Trend Dance Academy</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //custom-theme -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../yotubechannel.php/css/style1.css">

        <!-- <link rel="stylesheet" href="../Capstone-Project/Services/css/templatemo-style.css"> -->

    <link href="css/popup-box.css" rel="stylesheet" type="text/css" property="" media="all" />
    <!-- carousel slider -->  
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> 
    <!-- //carousel slider -->  
    <!-- gallery -->
    <link href="css/lsb.css" rel="stylesheet" type="text/css">
    <!-- //gallery -->
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <!-- //font-awesome-icons -->
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <!-- <link rel="stylesheet" href="nicepage.css" media="screen"> -->
<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>

  <!--header-->
  <nav class="navbar navbar-default">
    <div class="navbar-header navbar-left">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h1 ><a class="navbar-brand" href="index.html"><span style="color:white;">You Trend</span></a></h1>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <nav class="link-effect-8" id="link-effect-8">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.html">Home</a></li>
                      <li><a href="#">Services</a></li>
          <li><a href="trainers.html">Trainers</a></li>
          <li class="dropdown">
            
            <ul class="dropdown-menu agile_short_dropdown">
              
            </ul>
          </li>
          <li><a href="contactus.html">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </nav>
  <body class="u-body"  style="background-color: black;">
    <header class="u-clearfix u-header u-header" id="sec-1f47">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
              <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
              </svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                    <rect y="1" width="16" height="2"></rect>
                    <rect y="7" width="16" height="2"></rect>
                    <rect y="13" width="16" height="2"></rect>
                  </symbol>
                </defs>
              </svg>
          </div>
        </nav>
      </div>
    </header>
    <!--header-->
    <div class="conrainer">
            <h1 class="headt">Beginner Videos </h1>
<?php
if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
            echo ' 
            <div class="yvideo-box"> 
                <iframe width="280" height="280" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe> 
                <h4>'. $item->snippet->title .'</h4> 
            </div>'; 
        } 
    } 
}else{ 
    echo '<p class="error">'.$apiError.'</p>'; 
}
?>
        </div>
    </body>
   <!-- footer -->
   <div class="footer" style="margin-top: 90px;">
	<div class="container">
		<h2 style="float: left;"><a href="index.html"><span style="color:white;">You Trend</span></a></h2>
		<form action="" method="post" style="float: left;">
			<input type="email" name="email" placeholder="Your email..." required="">
			<input type="submit" value=" ">
		</form>
		<div class="agileits_w3layouts_nav">
			<div class="clearfix"> </div>
		</div>
		<p>© 2021 You Trend. All rights reserved | Design by KSU Publications</p>
	</div>
</div>
<!-- //footer -->
</body>
</html>