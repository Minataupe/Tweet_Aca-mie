<?php

    // php formulaire
    if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        // security
        $email = htmlspecialchars($_POST['email']);
        $confirm_email = htmlspecialchars($_POST['confirm_email']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $username = htmlspecialchars($_POST['username']);
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $password = htmlspecialchars($_POST['password']);
        $salt = "vive le projet tweet_academy".$password;
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $hash = hash('ripemd160',$salt);

            if(isset($birthdate) && !empty($birthdate))
            {
                $birthdate_var = $birthdate;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($birthdate_var), date_create($today)); 
                $verif_birthdate = (int) $diff->format('%y');

                if($verif_birthdate >= 13) // modif
                {
                    if($email == $confirm_email)
                    {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            if($password == $confirm_password)
                            {
                                $requete_mail = $db->query("SELECT COUNT(*) AS 'email' FROM users WHERE email = '" . $email . "'"); // modif
                                $requete = $requete_mail->fetch(PDO::FETCH_OBJ);
                                $mail_exist = $requete->email;
                                if($mail_exist == 0)
                                {
                                    // INSERT INTO user
                                    $result = $db->query("INSERT INTO users (username, lastname, firstname, email, birthdate, password) 
                                                        VALUES ('" . $username . "', 
                                                                '" . $lastname . "', 
                                                                '" . $firstname . "', 
                                                                '" . $email . "', 
                                                                '" . $birthdate . "', 
                                                                '" . $hash . "')");
                                    $insert = $result->fetch(PDO::FETCH_OBJ);

                                    $_SESSION['compte_valide'] = "Votre compte a bien été créer. Merci de votre inscription.";
                                    // header('Location: connexion.php');
                                    // header('Location: routeur.php'); // new model for -> Front
                                }
                                else
                                {
                                    $erreur = "Cette adresse mail est déja utilisé.";
                                }
                            }
                            else
                            {
                                $erreur = "Attention, votre mot de passe ne correspond pas avec la comfirmation.";
                            }
                        }
                        else
                        {
                            $erreur = "Attention, votre adresse mail n'est pas valide, veuillez la vérifier.";
                        }
                    }
                    else
                    {
                        $erreur = "Attention, votre adresse mail ne correspond pas avec la comfirmation.";
                    }
                }    
                else
                {
                    $erreur = "Désolez mais vous ne resptectez l'âge minimum demandé.";
                    //fun vers page enfant
                }
            }    
            else
            {
                $erreur = "Attention, votre date de naissance est obligatoire. Veuillez la renseigner.";
            }
        }
        else
        {
            $erreur = "Veuillez remplir tous les champs.";
        }
    ?>