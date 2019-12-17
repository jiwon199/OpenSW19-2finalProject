<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>YouView - Reviews</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                            <style>
                                     img{
                                          
                                          float:left; 
                                          width:140px;
			height:120px;
                                         
                                          margin-botton: -110px;
                                          padding:-px; 
                                          
		           }
                            </style>

	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="home2.php">YouView</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="home2.php">Home</a></li>
					<li><a href="channels2.php">Channel</a></li>
					<li><a href="video2.php">Video</a></li>
					<li><a href="review2.php">Review</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2>Videos</h2>
                                                                                     <h3> 12월 첫째 주 top 30개의 영상을 확인하세요.</h3>
					</header>

					 
					<!-- Table -->
						<section>
							<div class="table-wrapper">
								<table class="alt">
									 
									<tbody>
										
<?php

           $conn = mysqli_connect("localhost", "root", '1234');
           $status=mysqli_select_db($conn, "YouView"); 
           $jb_result = mysqli_query($conn, "SELECT * FROM video");  
           $jb_result2 = mysqli_query($conn, "SELECT * FROM image_video");
           $jb_result3 = mysqli_query($conn, "SELECT * FROM video_src");
           while( $jb_row = mysqli_fetch_array( $jb_result ) and $jb_row2 = mysqli_fetch_array( $jb_result2 ) and $jb_row3 = mysqli_fetch_array( $jb_result3 )){          
                      $m=$jb_row2[ 'img' ];
                      $l=$jb_row3[ 'img' ];
                       
                      echo "<tr style =onclick='location.href=$l'><td><a href=$l><div><img src= $m></div></a></td>";
                      echo "<td style='vertical-align:top'><a href=$l style='text-decoration:none'><b>" . $jb_row[ 'videoName' ] . "</b></a><br />";
	        echo $jb_row[ 'channelName' ] . '<br />' . $jb_row[ 'category' ] . '<br />' . $jb_row[ 'view' ]. '</td></tr>';
                   
                    
            }
    
?>
									</tbody>
								</table>
							</div>
						</section>

<!--Paging-->
      <div class = "center"> 
         <div class="pagination">
            <a href="#">&laquo;</a>
             <a href="#" class="active">1</a>
             <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">&raquo;</a>
         </div> 
      </div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>