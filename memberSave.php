<?php
 @$mysqli = new mysqli('localhost', 'review', 'review123', 'YouView');
 
 if(mysqli_connect_errno()){
     echo "<p>Error: Could not connect to database.<br/>
     Please try again later.</p>";
     exit;
 }
 $ID=$_POST['memberId'];
 $PWD=md5($_POST['memberPw']);
 $NickName=$_POST['memberNickName'];
 $password2=$_POST['memberPw2'];

 $query="INSERT INTO youviewer VALUES (? ,? ,?)";
 $stmt=$mysqli->prepare($query);
 $stmt->bind_param('sss',$ID,$PWD,$NickName);
 $stmt->execute();

 if($stmt->affected_rows>0){

 }
 else{
     exit;
 }

 $mysqli->close();
 
 header('Location: ./home.php');
?>