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
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="home.php">YouView</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="home.php">Home</a></li>
					<li><a href="channel.php">Channel</a></li>
					<li><a href="elements.html">Video</a></li>
					<li><a href="review.php">Review</a></li>
					<li><a href="login.php">Sign In</a></li>
					<li><a href="join.php">Sign Up</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2>Reviews</h2>
<?php
$keyword = $_POST['keyword'];
echo '<t2><b>'.$keyword.'</b>에 대한 검색 결과입니다.</t2>';
?>

					</header>



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
   $keyword = $_POST['keyword'];
   @$db = mysqli_connect('localhost', 'review', 'review123', 'YouView');

   $jb_sql="SELECT * FROM reviews ORDER BY date DESC;";

   $jb_result=mysqli_query($db, $jb_sql);

   while(  $jb_row = mysqli_fetch_array( $jb_result )  ) {
	if ($jb_row['tag_one']==$keyword || $jb_row['tag_one']==$keyword || $jb_row['tag_one']==$keyword) {
	echo '<tr><th width="4%">' . $jb_row['channelName'].'</th><th width="15%">'.$jb_row['Title'].'</th><th width="6%">'.$jb_row['date'].'</th><th width="5%">'.$jb_row['NickName'].'</th><th width="4%">'.$jb_row['star_avg'].'</th></tr>';
	echo '<tr><th colspan="5">' . $jb_row['Content'].'</th></tr>';
     }
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
						<section>
							<ul class="actions">
								<li><a href="review.php" class="button">돌아가기</a></li>
							</ul>
						</section>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>