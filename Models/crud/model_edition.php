<?php
session_start();

// Modify the Profil
if(isset($_SESSION['id']))
{
    $requete_user = $db->query("SELECT * FROM `users` WHERE id = '" . $_SESSION['id'] . "'");
    $user_info = $requete_user->fetch();
        // Modify the Email if that one is not the same than the one previous
        if((isset($_POST['new_email']) && !empty($_POST['new_email'])) && ($_POST['new_email'] != $user_info['email']))
        {
            $new_email = htmlspecialchars($_POST['new_email']);
            $insert_email = $db->query("UPDATE `users` SET email = '" . $new_email . "' WHERE id = '" . $_SESSION['id'] . "'");
            $user_info = $insert_email->fetch();
            header("Location: My_profil.php?id=" . $_SESSION['id']);
        }
        // Modify the Firstname if that one is not the same than the one previous
        if((isset($_POST['new_firstname']) && !empty($_POST['new_firstname'])) && ($_POST['new_firstname'] != $user_info['firstname']))
        {
            $new_firstname = htmlspecialchars($_POST['new_firstname']);
            $insert_firstname = $db->query("UPDATE `users` SET firstname = '" . $new_firstname . "' WHERE id = '" . $_SESSION['id'] . "'");
            $user_info = $insert_firstname->fetch();
            header("Location: My_profil.php?id=" . $_SESSION['id']);
        }
        // Modify the Lastname if that one is not the same than the one previous
        if((isset($_POST['new_lastname']) && !empty($_POST['new_lastname'])) && ($_POST['new_lastname'] != $user_info['lastname']))
        {
            $new_lastname = htmlspecialchars($_POST['new_lastname']);
            $insert_lastname = $db->query("UPDATE `users` SET lastname = '" . $new_lastname . "' WHERE id = '" . $_SESSION['id'] . "'");
            $user_info = $insert_lastname->fetch();
            header("Location: My_profil.php?id=" . $_SESSION['id']);
        }
        // Modify the Username if that one is not the same than the one previous
        if((isset($_POST['new_username']) && !empty($_POST['new_username'])) && ($_POST['new_username'] != $user_info['username']))
        {
            $new_username = htmlspecialchars($_POST['new_username']);
            $insert_username = $db->query("UPDATE `users` SET username = '" . $new_username . "' WHERE id = '" . $_SESSION['id'] . "'");
            $user_info = $insert_username->fetch();
            header("Location: My_profil.php?id=" . $_SESSION['id']);
        }
        // Modify the Password if that one is not the same than the one previous
        if((isset($_POST['new_password']) && !empty($_POST['new_password'])) && (isset($_POST['confirm_new_password']) && !empty($_POST['confirm_new_password'])))
        {
            $mdp1 = sha1($_POST['new_password']);
            $mdp2 = sha1($_POST['confirm_new_password']);

            if($mdp1 == $mdp2)
            {
                $insert_password = $db->query("UPDATE `users` SET password = '" . $mdp1 . "' WHERE id = '" . $_SESSION['id'] . "'");
                $user_info = $insert_password->fetch();
                header("Location: My_profil.php?id=" . $_SESSION['id']);

            }
            else
            {
                $erreur = "Les mots de passe ne sont pas identiques";
            }
        }
        // Set up the Avatar 
        if(isset($_FILES['Avatar']) AND !empty($_FILES['Avatar']['name'])){
            $tailleMax = 2097152;
            $extensionsValides = array('jpg','jpeg','gif','png');
            if($_FILES['Avatar']['size']<= $tailleMax){
                $extensionUpload = strtolower(substr(strrchr($_FILES['Avatar']['name'], '.'), 1)); 
                if(in_array($extensionUpload, $extensionsValides)){
                    $path = "../Controllers/membres/avatar".$_SESSION['id'].".".$extensionUpload;
                    $result = move_uploaded_file($_FILES['Avatar']['tmp_name'],$path);
                    if($result){
                        $updateAvatar = $db->prepare('UPDATE users SET avatar = :Avatar WHERE id = :id');
                        $updateAvatar->execute(array(
                            'Avatar' => $_SESSION['id'].".".$extensionUpload,
                            'id' => $_SESSION['id']
                        ));
                        header("Location: My_profil.php?id=" . $_SESSION['id']);
                    }else{
                        $erreur = "An Error occured during the importation of the Avatar";
                    }
                }else{
                    $erreur = "Your Avatar must be a jpg, jpeg, gif, png file.";
                }
            }else{
                $erreur = "Your Avatar do not have the correct size (2Mo).";
            }
        }
        // Set up the Banner
        if(isset($_FILES['banner']) AND !empty($_FILES['banner']['name'])){
            $maxLength = 10485760;
            $goodExtension = array('jpg','jpeg','gif','png');
            if($_FILES['banner']['size']<= $maxLength){
                $uploadExtension = strtolower(substr(strrchr($_FILES['banner']['name'], '.'), 1)); 
                if(in_array($uploadExtension, $goodExtension)){
                    $paths = "../Controllers/membres/banners".$_SESSION['id'].".".$uploadExtension;
                    $results = move_uploaded_file($_FILES['banner']['tmp_name'],$paths);
                    if($results){
                        $updateBanner = $db->prepare('UPDATE users SET banner = :banner WHERE id = :id');
                        $updateBanner->execute(array(
                            'banner' => $_SESSION['id'].".".$uploadExtension,
                            'id' => $_SESSION['id']
                        ));
                        header("Location: My_profil.php?id=" . $_SESSION['id']);
                    }else{
                        $erreur = "An Error occured during the importation of the Banner";
                    }
                }else{
                    $erreur = "Your Banner must be a jpg, jpeg, gif, png file.";
                }
            }else{
                $erreur = "Your Banner do not have the correct size (10Mo).";
            }
        }
        // Set Biography
        if(isset($_POST['bio']) && !empty($_POST['bio'])){
            $bio = htmlspecialchars($_POST['bio']);
            if(isset($_POST['subBio']) && !empty($_POST['subBio'])){
                $query = $db->prepare("UPDATE users SET bio = :bio WHERE id = :id");
                $exec = $query->execute(array(
                    'bio' => $bio,
                    'id' => $_SESSION['id']
                ));
            }
            
        }
        // Delete users From all Table
        if(isset($_GET['delete'])){
            $delete = htmlspecialchars($_GET['delete']);

            //Delete From Follows

            $follower = $db->prepare('UPDATE followers SET follower = 13 WHERE follower = :id');
            $following = $db->prepare('UPDATE followers SET folllowing = 13 WHERE folllowing = :id');

            $follower->execute(array('id' => $_SESSION['id'],));
            $following->execute(array('id' => $_SESSION['id'],));

            //Delete From Comment

            $comment = $db->prepare('UPDATE comments SET users_id = 13 WHERE users_id = :id');

            $comment->execute(array('id' => $_SESSION['id'],));

            //Delete From Private MSG

            $private_msg_sender = $db->prepare('UPDATE private_msg SET sender = 13 WHERE sender = :id');
            $private_msg_receiver = $db->prepare('UPDATE private_msg SET receiver = 13 WHERE receiver = :id');

            $private_msg_sender->execute(array('id' => $_SESSION['id'],));
            $private_msg_receiver->execute(array('id' => $_SESSION['id'],));

            //Delete From R-T

            $retweet_tweet = $db->prepare('UPDATE retweet SET tweet_id = 13 WHERE tweet_id = :id');
            $retweet_user = $db->prepare('UPDATE retweet SET users_id = 13 WHERE users_id = :id');

            $retweet_tweet->execute(array('id' => $_SESSION['id'],));
            $retweet_user->execute(array('id' => $_SESSION['id'],));

            //Delete From Tweet
            $del_tweet = $db->prepare('UPDATE tweet SET users_id = 13 WHERE users_id = :id');

            $del_tweet->execute(array('id' => $_SESSION['id'],));

            //Delete From Tweet-Likes
            $del_like = $db->prepare('UPDATE tweet_like SET users_id = 13 WHERE users_id = :id');

            $del_like->execute(array('id' => $_SESSION['id'],));

            //Delete the User
            $ciaoBambino = $db->prepare('DELETE FROM users  WHERE id = :id');

            $ciaoBambino->execute(array('id' => $_SESSION['id'],));




            
            header("Location: ../Controllers/sign_up.php");

        }
}
else
{
    header("Location: connexion.php");
}
?>