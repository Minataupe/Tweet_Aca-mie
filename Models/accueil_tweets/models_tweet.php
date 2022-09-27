<?php
session_start();
    $allComment = $db->prepare("SELECT * FROM users LEFT JOIN tweet ON users.id = tweet.users_id WHERE content != 'NULL' ORDER BY tweet.id DESC;");
    $allComment->execute(); // à enlever
?>