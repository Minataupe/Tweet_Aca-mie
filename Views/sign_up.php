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
            <li class="nav-item">
                <a class="nav-link"  href="">tweet</a>
            </li>
        </ul>
    </nav>

    <br>
    <br>

    <!--formulaire-->
    <div align="center">
        <h3>Inscription</h3>
        <br><br><br>
        <form action="" method="post">
            <table>
                <!--email-->
                <tr>
                    <td>
                        <label for="email">email:</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="email" value="<?= (isset($email)) ? $email : ''?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="confirm_email">confirm email:</label>
                    </td>
                    <td>
                        <input type="email" name="confirm_email" id="confirm_email" placeholder="confirm email" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="lastname">lastname:</label>
                    </td>
                    <td>
                        <input type="text" name="lastname" id="lastname" placeholder="lastname" value="<?= (isset($lastname)) ? $lastname : ''?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="firstname">firstname:</label>
                    </td>
                    <td>
                        <input type="text" name="firstname" id="firstname" placeholder="firstname" value="<?= (isset($firstname)) ? $firstname : ''?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="username">username:</label>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="username" value="<?= (isset($username)) ? $username : ''?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="birthdate">birthdate:</label>
                    </td>
                    <td> 
                        <input type="date" name="birthdate" id="birthdate" required>
                    </td> 
                </tr>

                <tr>
                    <td>
                        <label for="password">password:</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="mot de passe" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="confirm_password">confirm password:</label>
                    </td>
                    <td>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmer votre mot de passe" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=""></label>
                    </td>
                    <td align="center">
                        <br>
                        <input type="reset" value="reset">
                        <input type="submit" value="inscripion" name="form_inscription">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($erreur))
            {
                ?>
                    <font color='red'><?=$erreur?></font>
                <?php
            }
        ?>
        <br>
        <button name="connexion_button" id="connexion_button" value="Connexion"><a href="connexion.php">Connexion</a></button>
    </div>
</body>
</html>