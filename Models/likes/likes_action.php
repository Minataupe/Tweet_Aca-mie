<?php
require '../../Models/db_connect.php';

session_start(); // modif
    $get_id = (int) $_REQUEST['id']; // modif 
    $get_likes = (int) $_REQUEST['like']; // modif

    $check = $db->prepare('SELECT * FROM tweet WHERE id = ?');
    $check->execute(array($get_id));

    echo $check->rowCount();
    if($check->rowCount() == 1)
    {
        if($get_likes == 1)
        {
            // session_start();
            $check_likes = $db->prepare('SELECT * FROM tweet_like WHERE tweet_id = ? AND users_id = ?');
            $check_likes->execute(array($get_id, $_SESSION['id']));
            if($check_likes->rowCount() == 1)
            {
                $delete_likes = $db->prepare('DELETE FROM tweet_like WHERE tweet_id = ? AND users_id = ?');
                $delete_likes->execute(array($get_id, $_SESSION['id']));
            }
            else
            {                
                $insert = $db->prepare('INSERT INTO tweet_like (tweet_id, users_id) VALUES(?,?)');
                $insert->execute(array($get_id, $_SESSION['id']));
            }
        }
    }
?>