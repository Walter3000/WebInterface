
<?php
if(isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $comments = $db->query("Select * from comments WHERE annoucementID=". $_GET['id'] ." ORDER BY id DESC");
    if(isset($comments)){
    foreach ($comments as $comment){
        echo "<texarea>".$comment['content']."</textarea>";
    }
    }else{
        echo "<p>No Comments could be found</p>";
    }
}else{
        echo "<p>No Comments could be found</p>";
    }

