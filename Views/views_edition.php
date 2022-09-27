<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Tweet_academie</title>
</head>
<body>
<nav>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sign_up.php">inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="connexion.php">Connexion</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link"  href="">tweet</a>
        </li> -->
    </ul>

    
</nav>

    <br>
    <br>

    <!--formulaire-->
    <div align="center">
        <h3>Edition du profil</h3>
        <br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div align="center">

                <label for="bio">Bio :(max: 150 character)</label>
                <textarea name="bio" maxlength="150"></textarea>
                
                <input type="submit" name="subBio" value="Change your Bio" ></input>
            </div>
            <br>
            <!--username-->
            <label for="new_username">username :</label>
                <input type="text" name="new_username" id="" placeholder="new_username" value="<?php echo $user_info['username']?>"> <br> </br>
            <!--Lastname-->
            <label for="new_lastname">Lastname :</label>
                <input type="text" name="new_lastname" id="" placeholder="new_lastname" value="<?php echo $user_info['lastname']?>"> <br> </br>
            <!--*Firstname-->    
            <label for="new_firstname">Firstname :</label>
                <input type="text" name="new_firstname" id="" placeholder="new_firstname" value="<?php echo $user_info['firstname']?>"> <br> </br>
            <!--Email-->
            <label for="new_email">Email :</label>
                <input type="email" name="new_email" id="" placeholder="new_email" value="<?php echo $user_info['email']?>"> <br> </br>
            <!--Birthdate-->
            <label for="new_birthdate">Birthdate :</label>
                <input type="date" name="new_birthdate" id="" value="<?php echo $user_info['birthdate']?>"> <br> </br>
    
            <!--Password-->
            <label for="new_password">Password :</label>
                <input type="password" name="new_password" id="" placeholder="new_password"> <br> </br>
            <!--Confirm_password-->
            <label for="confirm_new_password">Confirm Password :</label>
                <input type="password" name="confirm_new_password" id="" placeholder="confirm new_password"> <br> </br>
            <!-- Avatar -->
            <label for="Avatar">Avatar :</label>
            <input type="file" name="Avatar">
            <br></br>
            <!-- Banner -->
            <label for="banner">Banner :</label>
            <input type="file" name="banner">
            <br></br>
            <input type="submit" value="Mise à jour du profil">
        </form>
        <!-- Delete user From Table Users -->
        <form method="get">
            <input type="submit" name="delete" value="Delete your acount">
        </form>
        <?php
            if(isset($erreur))
            {
                ?>
                    <font color='red'><?=$erreur?></font>
                <?php
            }
        ?>
    </div>

</body>
</html>