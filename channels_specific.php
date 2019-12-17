﻿<!DOCTYPE HTML>
<html>
<head>
      <title>YouView-Channels 2 </title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
      <link rel="stylesheet" href="assets/css/main.css" />
      <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
      <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
      <style>
         
      <!--코드-->
         
           table {
              width: 70%;
              height:100px;
              margin:auto;
              text-align:center;
            }

      th, td {
         padding: 10px;
         border-bottom: 1px solid #fff;
            }
 
      img{
      width:250px;
      height:250px;
      }      

      
      </style>
</head>

<body class="landing">
   <form action="channels2.php" method="get">

      <!-- Header -->
         <header id="header" class="skel-layers-fixed">
            <h1><a href="home.php">YouView</a></h1>
            <a href="#nav">Menu</a>
         </header>

      <!-- Nav -->
         <nav id="nav">
            <ul class="links">
               <li><a href="home2.php">Home</a></li>
               <li><a href="channels2.php">Channel</a></li>
               <li><a href="videos.html">Video</a></li>
               <li><a href="review.php">Review</a></li>
               <li><a href="logout.php">Log Out</a></li>
                
            </ul>
         </nav>
      <!--Main-->
         <section id="main" class="wrapper">
            <div class="container">
               <header class="major special">
                  <h2>Channels</h2>
               </header>
      
      <!-- Table -->

<br>
<!--크롤링 코드--> 
<!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
   <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img src="https://yt3.ggpht.com/a/AGF-l7-NQdbfxI9mOxPjpTV5NZ34oHC56_TgbLIHAA=s300-c-k-c0xffffffff-no-rj-mo" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">BlackPink</h1>
        <p>구독자 3050만명<br>조회수 75.1억회<br>음악</p>
        <a class="button special" href="#">More</a>
      </div>
      <div class = "col-lg-9" >
<? php 
 
  

 @$db = mysqli_connect('localhost', 'root', '1234', 'YouView');
  $jb_sql="SELECT * FROM reviews WHERE channelName = 'SMTOWN' ORDER BY date DESC;";
   $jb_result=mysqli_query($db, $jb_sql);
<table> 

</table>
?> 왜지 </div>
      <!-- /.col-md-4 -->
    </div>
</div>
    <!-- /.row -->

<br><br>

<div class="table-wrapper">
  <table class="alt">                  
          <thead>
          <th>Channel</th> 
          <th>Title</th>
          <th>Date</th>
          <th>NickName</th>
          <th>Rate</th> 
         </thead>    
      <tbody>
 
<?php

    
 	$num=$_GET[ 'num' ];
    	$sort = $_GET[ 'sort' ];
     	$conn = mysqli_connect("localhost", "root", '1234');
     	$status=mysqli_select_db($conn, "YouView"); 
    	if($sort=='a') { 
	$jb_result = mysqli_query($conn, "SELECT * FROM channels_view");  
	$jb_result2 = mysqli_query($conn, "SELECT * FROM image_view");  
	}
            else { 
	$jb_result = mysqli_query($conn, "SELECT * FROM channels_sub");   
	$jb_result2 = mysqli_query($conn, "SELECT * FROM image_sub"); 
	}
   
 
 while( $jb_row = mysqli_fetch_array( $jb_result ) and $jb_row2 = mysqli_fetch_array( $jb_result2 ) ){
             if($jb_row[ 'channelSeq' ]==$num){
		 
                            $name=$jb_row[ 'channelName' ];
		$subscriber=$jb_row[ 'subscriber' ];
		$view=$jb_row[ 'view' ];
		$category=$jb_row[ 'category' ];
		$img=$jb_row2[ 'img' ];
              }
  }
echo $name;
echo $subscriber;
echo $view;
echo $category;
echo $img;  
  
 

   
    
   @$db = mysqli_connect('localhost', 'root', '1234', 'YouView');

   $jb_sql="SELECT * FROM reviews ORDER BY date DESC;";

  

   $jb_result3=mysqli_query($db, $jb_sql);
     
   while(  $jb_row3 = mysqli_fetch_array( $jb_result3 )  ) {
   if($jb_row3[ 'channelName']==$name){
   echo '<tr><th width="4%">' . $jb_row3['channelName'].'</th><th width="15%">'.$jb_row3['Title'].'</th><th width="6%">'.$jb_row3['date'].'</th><th width="5%">'.$jb_row3['NickName'].'</th><th width="4%">'.$jb_row3['star_avg'].'</th></tr>';
   echo '<tr><th colspan="5">' . $jb_row3['Content'].'</th></tr>';
  }
   }

   $db->close();
   
   
  
?>
                           </tbody>
                        </table>
                     </div>
                  </section>

               </div>
            </div>
         </div>               
</section>

      

<!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/skel.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>
</form>
</body>
</html>