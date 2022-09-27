<?php
session_start();

// $user = "root";
// $pass = "root";
// $db = new PDO("mysql:host=localhost;dbname=mymeetic", $user, $pass);

    if(isset($_POST['form_connexion']))
    {
        $email_connect = htmlspecialchars($_POST['email_connect']);
        $password_connect = htmlspecialchars($_POST['password_connect']);
        $salt = "vive le projet tweet_academy".$password_connect;
        $hash = hash('ripemd160',$salt);

        if(!empty($email_connect) && !empty($password_connect))
        {
            $requete_user = $db->query("SELECT COUNT(*) AS connexion FROM users 
                                        WHERE email = '" . $email_connect . 
                                        "' AND password = '" . $hash . "'");
            $requete = $requete_user->fetch(PDO::FETCH_OBJ);
            $user_exist = $requete->connexion;
            if($user_exist == 1)
            {
                $info = $db->query("SELECT * FROM users WHERE email = '" . $email_connect . "' AND password = '" . $hash . "'");
                $user_info = $info->fetch();
                $_SESSION['id'] = $user_info['id'];
                $_SESSION['username'] = $user_info['username'];
                $_SESSION['lastname'] = $user_info['lastname'];
                $_SESSION['firstname'] = $user_info['firstname'];
                $_SESSION['email'] = $user_info['email'];
                $_SESSION['birthdate'] = $user_info['birthdate'];
                $_SESSION['country'] = $user_info['country'];
                $_SESSION['bio'] = $user_info['bio'];
                $_SESSION['avatar'] = $user_info['avatar'];
                $_SESSION['banner'] = $user_info['banner'];

                // header("Location: Controllers/My_profil.php?id=" . $_SESSION['id']); // a modifier direction tweet.php -> acceuil
                header("Location: Controllers/tweets/tweet_control.php?id=" . $_SESSION['id']); // new model for -> Front
            }
            else
            {
                $erreur = "Une erreur d'identifiant ou mot de passe est survenu";
            }
        }
        else
        {
            $erreur = "Tous les champs ne son pas rempli";
        }
    }

?>