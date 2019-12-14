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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

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
					<li><a href="channel2.php">Channel</a></li>
					<li><a href="elements.html">Video</a></li>
					<li><a href="review.php">Review</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2>Reviews</h2>
					</header>

					<!-- Button -->
						<section>
							<ul class="actions">
								<li><a href="write_review.html" class="button special">write</a></li>
							</ul>
						</section>

<form action="review_search_result2.php" method="post">
<div class="box">
  <div class="container-1" style="margin:auto">
      <span class="icon"><a href="review_search_result.php"><i class="fa fa-search"></i></a></span>
      <input type="search" name="keyword" id="search" placeholder="Search..." />
  </div>
</div>
</form>

					<!-- Table -->
						<section>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Channel</th>
											<th>Title</th>
											<th>Date</th>
											<th>NickName</th>
											<th>rate</th>
										</tr>
									</thead>
									<tbody>
										
<?php
$fp = fopen("nicknamesaved.txt", 'r');
flock($fp, LOCK_SH); // lock file for reading
$NickName=fgets($fp);
flock($fp,LOCK_UN);
fclose($fp);

   $ChannelName = $_POST['ChannelName'];
   $Title = $_POST['Title'];
   $Content = $_POST['Content'];
   $tag_one = $_POST['tag_one'];
   $tag_two = $_POST['tag_two'];
   $tag_three = $_POST['tag_three'];
   $date=date('YmdHis');

   $star_one=$_POST['star_one'];
   $star_two=$_POST['star_two'];
   $star_three=$_POST['star_three'];
   $star_four=$_POST['star_four'];

   if ($star_one=="five"){
	$star_one=5;
   }else if ($star_one=="four"){
	$star_one=4;
   }else if ($star_one=="three"){
	$star_one=3;
   }else if ($star_one=="two"){
	$star_one=2;
   }else if ($star_one=="one"){
	$star_one=1;
   }

   if ($star_two=="five"){
	$star_two=5;
   }else if ($star_two=="four"){
	$star_two=4;
   }else if ($star_two=="three"){
	$star_two=3;
   }else if ($star_two=="two"){
	$star_two=2;
   }else if ($star_two=="one"){
	$star_two=1;
   }

   if ($star_three=="five"){
	$star_three=5;
   }else if ($star_three=="four"){
	$star_three=4;
   }else if ($star_three=="three"){
	$star_three=3;
   }else if ($star_three=="two"){
	$star_three=2;
   }else if ($star_three=="one"){
	$star_one=1;
   }

   if ($star_four=="five"){
	$star_four=5;
   }else if ($star_four=="four"){
	$star_four=4;
   }else if ($star_four=="three"){
	$star_four=3;
   }else if ($star_four=="two"){
	$star_four=2;
   }else if ($star_four=="one"){
	$star_four=1;
   }
   $star_avg = ($star_one + $star_two + $star_three + $star_four) / 4.0;

   @$db = new mysqli('localhost', 'review', 'review123', 'YouView');

   if (mysqli_connect_errno()) {
      echo "<p>Error: Could not connect to database.<br />Please try again later.</p>";
      exit;
  }

   $query="INSERT INTO reviews VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   $stmt=$db->prepare($query);
   $stmt->bind_param('ssssddddddsss', $ChannelName, $NickName, $Title, $Content, $date, $star_one, $star_two, $star_three, $star_four, $star_avg, $tag_one, $tag_two, $tag_three);
   $stmt->execute(); 

   $db->close();


   @$db = mysqli_connect('localhost', 'review', 'review123', 'YouView');

   $jb_sql="SELECT * FROM reviews ORDER BY date DESC;";

   $jb_result=mysqli_query($db, $jb_sql);

   while(  $jb_row = mysqli_fetch_array( $jb_result )  ) {
	echo '<tr><th width="4%">' . $jb_row['channelName'].'</th><th width="15%">'.$jb_row['Title'].'</th><th width="6%">'.$jb_row['date'].'</th><th width="5%">'.$jb_row['NickName'].'</th><th width="4%">'.$jb_row['star_avg'].'</th></tr>';
	echo '<tr><th colspan="5">' . $jb_row['Content'].'</th></tr>';
   }

   $db->close();
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