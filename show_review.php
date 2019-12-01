<!DOCTYPE html>
<html>
<head>
<title>YouView</title>
</head>

<body>
<?php
if ( !isset($_POST['ChannelName']) || !isset($_POST['NickName']) || !isset($_POST['Title']) || !isset($_POST['Content'])) {
echo "<p>You have not entered all the required details.<br/>Please go back and try again.</p>";
exit;
}

   $ChannelName = $_POST['ChannelName'];
   $NickName = $_POST['NickName'];
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

   if ($stmt->affected_rows > 0) {

      echo "<p>review inserted into the database.</p>";
   } else {

      echo "<p>An error has occurred.<br />
   
      The item was not added.</p>";
   }


   $db->close();


?>
</body>
</html>