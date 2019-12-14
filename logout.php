<?php
session_start();
unset($_SESSION['ses_userid']);
if($_SESSION['ses_userid']==null){
    header('Location: ./home.php');
}
?>