<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    @$mysqli = new mysqli('localhost', 'review', 'review123', 'YouView');
 
    if(mysqli_connect_errno()){
        echo "<p>Error: Could not connect to database.<br/>
        Please try again later.</p>";
        exit;
    }
 
    $memberId = $_POST['memberId'];
    $memberPw =$_POST['memberPw'];
    $memberPw=md5($memberPw);
 
    $sql = "SELECT * FROM youviewer WHERE YouViewerID = '$memberId' and YouViewerPWD='$memberPw'";
    $res = $mysqli->query($sql);
   
    $row = $res->fetch_array(MYSQLI_ASSOC);
        
    if($row!=null){
        $_SESSION['ses_userid']=$row['YouViewerID'];
        header("Content-Type:text/html;charset=utf-8");
        $document_root = $_SERVER['DOCUMENT_ROOT']; 
    	$fp = fopen("$document_root/nicknamesaved.txt", 'w');
        $output = "SELECT NickName FROM youviewer WHERE YouViewerID='$memberId'";
        $res2=$mysqli->query($output);    

    	fwrite($fp, $row['NickName'], strlen($row['NickName']));
        fclose($fp);
        if(isset($_SESSION['ses_userid'])){
            header('Location: ./home2.php');
        }
    }
    else{
        echo "<script>alert('로그인 실패하셨습니다. 로그인 페이지로 돌아갑니다.')</script>";
        header('Location: ./login.php');
    }

?>