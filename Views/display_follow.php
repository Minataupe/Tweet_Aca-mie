<?php
require("../Models/crud/model_profil.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../Views/style_display_follow.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../Controllers/My_profil.php?id=<?= $_SESSION['id']?>">Return to Profile</a>
            </li>
        </ul>
    <ul>
        <h2>Those users are Following you : </h2>
    <?php
foreach ($display_followeur as $follower) {
    echo "<li>" . $follower['username'] . "</li>";

}
?>
    

    
    <h2>you have followed those users : </h2>
  
    <?php
foreach ($display_followingseu as $following) {
    echo "<li>" . $following['username'] . "</li>";
}
?>
    </ul>

</body>
</html>