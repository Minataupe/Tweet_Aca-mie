<?php
$id_tweet = htmlspecialchars($_GET['id']);
$id_tweet = intval($id_tweet);

    if(!empty($id_tweet))
    {
        session_start();
        $tweet = $db->prepare("SELECT * FROM tweet LEFT JOIN users ON tweet.users_id = users.id WHERE tweet.id = ?;");
        $tweet->execute(array($id_tweet));
        $reponse = $tweet->fetch(PDO::FETCH_OBJ);

        $allComment = $db->prepare("SELECT * FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.tweet_id = ? ORDER BY comments.id DESC;");
        $allComment->execute(array($id_tweet));
    }
?>  