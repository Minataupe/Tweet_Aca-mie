<?php

if(isset($_GET['id'], $_POST['add_message'], $_POST['receiver']) AND !empty($_POST['add_message']) AND !empty($_POST['receiver'])) 
{
    require '../../Models/db_connect.php';

    $add_message = htmlspecialchars($_POST['add_message']);
    $receiver = htmlspecialchars($_POST['receiver']);
    $id = intval($_GET['id']);

    
    $check_receiver = $db->prepare('SELECT * FROM users WHERE username = ?');
    $check_receiver->execute(array($receiver));
    $count = $check_receiver->rowCount();
    $check_receiver = $check_receiver->fetch();
    echo "coucou " .$_POST['add_message'] . " " . $_POST['receiver'] . " " . $_GET['id'];
    echo "trouver:" . $count;
    if($count == 1)
    {
        $insert = $db->prepare('INSERT INTO private_msg (sender, receiver, message) VALUES(?,?,?)');
        $insert->execute(array($id, $check_receiver['id'], $add_message));
    }
    else
    {
        echo "Votre destinataire n'existe pas";
    }

    header('Location: ../../Controllers/private_message.php?id=' . $id);
}
