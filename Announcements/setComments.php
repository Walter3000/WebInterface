<?php
if(isset($_GET['id']) && isset($_GET['content'])){
    $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    $date = date("Y-m-d H:i:s");
    
    session_start();
    $id = $_GET['id'];
    $contentGET = $_GET['content'];
    $userID=NULL;
    if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
    $userID = $db->query("Select id FROM user WHERE password='$password' and username='$username'");
    echo var_dump($db->errorInfo());
    }
    $dbC = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    if($userID != NULL){
    $dbC->query("INSERT INTO comments (userID ,annoucementID ,created ,content) VALUES ('$userID','$id','$date','$contentGET')");
    }  else {
    $dbC->query("INSERT INTO comments (annoucementID ,created ,content) VALUES ('$id','$date','$contentGET')");    
    }
    echo var_dump($dbC->errorInfo());
}else{
    
}

