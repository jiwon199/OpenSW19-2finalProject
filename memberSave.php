<?php
 $host = 'localhost';
 $user = 'root';
 $pw = 'root';
 $dbName = 'myService';
 $mysqli = new mysqli($host, $user, $pw, $dbName);
 
 $id=$_POST['id'];
 $password=md5($_POST['pwd']);
 $name=$_POST['name'];
 
 $sql = "insert into account_info (id, pwd, name)";
 $sql = $sql. "values('$id','$password','$name')";
 if($mysqli->query($sql)){
echo 'success inserting';
}else{
    echo 'fail to insert sql';
}?>
