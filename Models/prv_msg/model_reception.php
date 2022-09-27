<?php
session_start();

if(isset($_SESSION['id']) AND !empty($_SESSION['id']) AND $_GET['id'] == $_SESSION['id']) 
{
    $msg = $db->prepare('SELECT * FROM private_msg WHERE receiver = ? ORDER BY id DESC');
    $msg->execute(array($_SESSION['id']));
    $msg_nbr = $msg->rowCount();
}
else {
    header('Location: connexion.php');
}

?>