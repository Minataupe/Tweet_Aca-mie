<?php

//delete private message from database
if(isset($_GET['id']) AND !empty($_GET['delete'])) {
    $delete = (int) $_GET['delete'];
    $delete = intval($delete);
    $delete = $db->prepare('DELETE FROM private_msg WHERE id = ?');
    $delete->execute(array($delete));
}