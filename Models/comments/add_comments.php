<?php
require '../db_connect.php';

$content_tweet = htmlspecialchars($_POST['content']);
$id_tweet = htmlspecialchars($_POST['id_tweet']);
$id_tweet = intval($id_tweet);

if(!empty($content_tweet))
{
    session_start();
    $comments_tweet = $db->prepare("INSERT INTO comments (content, tweet_id, user_id) VALUES (?, ?, ?);");
    $comments_tweet->execute(array($content_tweet, $id_tweet, $_SESSION['id']));


    $allComment = $db->prepare("SELECT * FROM users LEFT JOIN comments ON users.id = comments.user_id WHERE comments.tweet_id = ? ORDER BY comments.id DESC;");
    $allComment->execute(array($id_tweet));
    $reponse=$allComment->fetch(PDO::FETCH_OBJ);
    ?>
        <div class="comment-item">
        <p>
            <b><?= $reponse->username;?> ( <?= $reponse->date; ?> )
            </b>    
            <p><?= $reponse->content; ?></p>
        </p>
        </div>
    <?php
}
?>