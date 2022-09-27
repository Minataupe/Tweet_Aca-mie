<?php

if(isset($_POST['Uid']) && isset($_POST['fname']) && isset($_POST['lname']) 
&& isset($_POST['bdate']) && isset($_POST['country']) && isset($_POST['email']) && isset($_POST['pwd'])){
    $bdate = htmlspecialchars($_POST['bdate']);
    $uid = htmlspecialchars($_POST['Uid']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $country = htmlspecialchars($_POST['country']);
    $email = htmlspecialchars($_POST['email']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $salt = "vive le projet tweet_academy.".$pwd;
    $hash = hash('ripemd160',$salt);
    if(isset($bdate) && !empty($bdate)){
        $bday_var = $bdate;
        $day = date("Y-m-d");
        $diff = date_diff(date_create($bdate_var), date_create($day));
        $verif_birthdate = (int) $diff->format('%y');
        if($verif_birthdate > 12){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $requete_mail = $bdd->query("SELECT COUNT(*) AS 'email' FROM user WHERE email = '" . $email . "'");
            $requete = $requete_mail->fetch(PDO::FETCH_OBJ);
                $mail_exist = $requete->email;
                if($mail_exist == 0){
                $signup = $bdd->query("INSERT INTO users (uid,firstname,lastname,Birthdate,Country,email,pwd) VALUES(
                    '" . $uid . "', 
                    '" . $fname . "', 
                    '" . $lname . "', 
                    '" . $bdate . "', 
                    '" . $country . "', 
                    '" . $email . "', 
                    '" . $hash . "');");
                    $insert = $signup->fetch(PDO::FETCH_OBJ);


                }else{               
                $msg = "L'adresse E-mail est incorrect ou déja prise !";
                }
            }
        }
        $msg = "Vous n'avez pas l'âge pour vous inscrire";
        
    }

}






/*if(isset($_POST['Uid']) && isset($_POST['fname']) && isset($_POST['lname']) 
    && isset($_POST['bdate']) && isset($_POST['country']) && isset($_POST['email']) && isset($_POST['pwd'])){
    $uid = htmlspecialchars($_POST['Uid']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $country = htmlspecialchars($_POST['country']);
    $email = htmlspecialchars($_POST['email'])
    ;
    $pwd = htmlspecialchars($_POST['pwd']);
    $salt = "vive le projet tweet_academy.".$pwd;
    $hash = hash('ripemd160',$salt);
    $bdate = htmlspecialchars($_POST['bdate']);
    $day = date("Y-m-d");
    $diff = date_diff(date_create($bdate), date_create($day));
    if($diff !== 13){
        return "tu n'as pas l'âge";
    }else{
        $signup = $bdd->query("INSERT INTO users (uid,firstname,lastname,Birthdate,Country,email,pwd) VALUES ('$uid','$fname','$lname','$bdate','$country','$email','$hash')");

    }
    
    
}*/