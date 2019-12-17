﻿<!DOCTYPE HTML>
<html>
<head>
		<title>YouView-Channels</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style>
			.center {
			  text-align: center;
			}

			.pagination {
			  display: inline-block;
			}

			.pagination a {
			 color: black;
			 float: left;
 			 padding: 8px 16px;
 			 text-decoration: none;
			  border-radius: 5px;
			  transition: background-color .3s;
			}

			.pagination a.active {
			  background-color: #45AD97; /*버튼 색상*/
			  border-radius: 5px;
			  color: white;
			}

			.pagination a:hover:not(.active) {
				background-color: #ddd;
			}
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
		width:90px;
		height:90px;
                            margin-bottom: -120px;  
                            margin-right: -53px;                          
                            float:left;               
                            padding:0px; 
		}		

		#review_search_input{
			font-size:16px;
			height:45px;
			width:325px;
			margin-left: auto;
			margin-right: auto;
			padding:10px;
			border:1px solid;
			float:left;
		}
		#sort_1 {
			font-size:16px;
			height:45px;
			width:150px;
			padding:10px;
			border:1px solid;
			
		}
		#sort_2 {
			font-size:16px;
			height:45px;
			width:300px;
			padding:10px;
			border:1px solid;
		}
		#sort_3 {
			font-size:16px;
			height:45px;
			width:200px;
			padding:10px;
			border:1px solid;
		}
		</style>


 

</head>

<body class="landing">
	<form action="channels2.php" method="post">

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
		<!--Main-->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2>Channels</h2>
					</header>
		
		<!-- Table -->
				
		<!--코드 가져온거-->
		<form><input type="text" id="review_search_input" name="search" size="60" placeholder="검색어를 입력하세요">
		<input type="submit" class = "button special" value="검색"></form>
	
		<table>
		<tr align = "center">
 		<td>정렬 <select name="sort" id = "sort_1">
			<option value="a">조회순</option>
			<option value="b">구독순</option>
		<td>필터링 <input type="text" name="filter" id = "sort_2"size="20" maxlength="20" placeholder = "필터링 입력"/></td>
		</select></td>
		<td>카테고리 <select name="find2" id = "sort_3">
			<option value="c">전체</option>
			<option value="d">음악</option>
			<option value="e">엔터테인먼트</option>
			<option value="f">기타</option>
 		</select></td>
		<td><input type="submit" value="조회하기" class="button special"></td>
		</tr>
 
		</table>

<!--코드 가져온거 끝-->

<!--크롤링 코드--> 
<div class="table-wrapper">
  <table class="alt">                  
          <thead>
          <th>Pic</th> 
          <th>Channel Name</th>
          <th>Info</th> 
         </thead>    
      <tbody>
         <?php  
           $sort = (isset($_POST['sort']) && $_POST['sort']) ? $_POST['sort'] : NULL;
           $filter = (isset($_POST['filter']) && $_POST['filter']) ? $_POST['filter'] : NULL;
           $search= (isset($_POST['search']) && $_POST['search']) ? $_POST['search'] : NULL;
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
           
           $category=( isset($_POST['find2']) && $_POST['find2'] ) ? $_POST['find2'] : NULL;
           
          if($search == null){    
           while( $jb_row = mysqli_fetch_array( $jb_result ) and $jb_row2 = mysqli_fetch_array( $jb_result2 ) ) {
           	if( $jb_row[ 'channelName' ]!=$filter) {          
            
              
              $num=$jb_row[ 'channelSeq' ];
               
              $m=$jb_row2[ 'img' ];
              $l= 'channels.php';
                  
              if($category=='d'){
                       
		if( $jb_row[ 'category' ]=="음악"){   
                                           if($jb_row2[ 'imgNum' ] == $jb_row['channelSeq'])   echo "<tr><td><a href=$l onclick=window.open('','_blank').location.href='./channels_specific.php?num=$num&sort=$sort'><img src= $m></a></td>";
           			 echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
			}  
            }
            else if($category=='e'){
                           if( $jb_row[ 'category' ]=="엔터테인먼트"){
			 if($jb_row2[ 'imgNum' ] == $jb_row['channelSeq'])   echo "<tr><td><a href=$l onclick=window.open('','_blank').location.href='./channels_specific.php?num=$num&sort=$sort'><img src= $m></a></td>";
           			 echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
                            }
            }
            else if($category=='f'){
		if( $jb_row[ 'category' ]!="엔터테인먼트" && $jb_row[ 'category' ]!="음악"){
			 if($jb_row2[ 'imgNum' ] == $jb_row['channelSeq'])   echo "<tr><td><a href=$l onclick=window.open('','_blank').location.href='./channels_specific.php?num=$num&sort=$sort'><img src= $m></a></td>";
           			 echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
                            }

            }
            else{
		 echo "<tr><td><a href=$l onclick=window.open('','_blank').location.href='./channels_specific.php?num=$num&sort=$sort'><img src= $m></a></td>";
                             echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
           }
            }
          }     
      }
         else{
             
             while( $jb_row = mysqli_fetch_array( $jb_result ) and $jb_row2 = mysqli_fetch_array( $jb_result2 ) ) 
             {
		 $num=$jb_row[ 'channelSeq' ];
            		 $m=$jb_row2[ 'img' ];
           		 $l= 'channels2.php';
		 if($search==$jb_row[ 'channelName' ]){
		 echo "<tr><td><a href=$l onclick=window.open('','_blank').location.href='./channels_specific.php?num=$num&sort=$sort'><img src= $m></a></td>";
                             echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
                          }
             }
         }
        ?>
      </tbody>
    </table>

					</div>
				</div>
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
			<script src="assets/js/main.js"></script>
</body>
</html>