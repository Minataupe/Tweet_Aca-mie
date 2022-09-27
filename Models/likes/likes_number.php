<?php
require '../../Models/db_connect.php';

$likes = $db->prepare("SELECT id FROM tweet_like WHERE tweet_id = ?;");
$likes->execute(array($_REQUEST['id']));
$likes = $likes->rowCount(); // essayer de bouger du template vers models 

echo json_encode($likes);