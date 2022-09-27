<?php
session_start();

 $user = "root";
 $pass = "root";
 $db = new PDO("mysql:host=localhost;dbname=tweeter;port=3306", $user, $pass);

    // SET user
    error_reporting(0);
    $get_id = intval($_GET['id']);
    $requete_user = $db->query("SELECT * FROM `users` WHERE id = '" . $get_id . "'");
    $user_info = $requete_user->fetch();



    $requete_all_user = $db->query("SELECT * FROM `users`");
    $user_all_info = $requete_all_user->fetchAll();

    if(isset($_SESSION['id']) && $_SESSION['id'] != $get_id){
        $isFollowingOrNot = $db->prepare("SELECT * FROM followers WHERE follower = ? AND folllowing = ?");
        $isFollowingOrNot->execute(array($_SESSION['id'],$get_id));
        $isFollowingOrNot = $isFollowingOrNot->rowCount();
    }

    if(isset($_SESSION['id'])){
        $display_follower = $db->prepare("SELECT username FROM users LEFT JOIN followers ON users.id = followers.folllowing WHERE followers.follower = ?");
        $display_follower->execute(array($_SESSION['id']));
        $followers_Count = $display_follower->rowCount();
        
        $display_followers = $db->query("SELECT username FROM users LEFT JOIN followers ON users.id = followers.folllowing WHERE followers.follower =".$_SESSION['id']);
        $display_followeur = $display_followers->fetchAll();


        $display_following = $db->prepare("SELECT username FROM users LEFT JOIN followers ON users.id = followers.follower WHERE followers.folllowing =?");
        $display_following->execute(array($_SESSION['id']));
        $following_Count = $display_following->rowCount();

        $display_followings = $db->query("SELECT username FROM users LEFT JOIN followers ON users.id = followers.follower WHERE followers.folllowing =".$_SESSION['id']);
        $display_followingseu = $display_followings->fetchAll();
    }

    


?>