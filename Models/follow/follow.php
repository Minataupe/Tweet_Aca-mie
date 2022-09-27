<?php
session_start();
$user = 'root';
$pass = 'root';
$db = new PDO("mysql:host=localhost;dbname=tweeter;port=3306", $user, $pass);


$getFollowedId = intval($_GET['followedid']);

if($getFollowedId != $_SESSION['id']){
    $alreadyFollowed = $db->prepare("SELECT * FROM followers WHERE follower = ? AND folllowing = ?");
    $alreadyFollowed->execute(array($_SESSION['id'], $getFollowedId));
    $alreadyFollowed = $alreadyFollowed->rowCount();
    if($alreadyFollowed == 0){
        $addFollow = $db->prepare('INSERT INTO followers (follower,folllowing) VALUE (?,?)');
        $addFollow->execute(array($_SESSION['id'], $getFollowedId));
    }elseif($alreadyFollowed == 1){
        $deleteFollow = $db->prepare('DELETE FROM followers WHERE follower = ? AND folllowing = ?');
        $deleteFollow->execute(array($_SESSION['id'], $getFollowedId));
    }
    header("Location: http://localhost:8002/Controllers/My_profil.php?id=".$_SESSION['id']);
    
}   


?>