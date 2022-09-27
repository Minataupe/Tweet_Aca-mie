<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Message privé</title>
</head>
<body>
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.php">Accueil</a>
            </li>
            <?php
            if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id'])
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="edition.php">Editer mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="deconnexion.php">Deconnexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="private_message.php">Message</a>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Connexion</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link"  href="tweets/tweet_control.php">tweet</a>
            </li>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Message privé</h1>
                <?php
                if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id'])
                {
                    ?>
                    <form action="../Models/prv_msg/add_private_message.php?id=<?php echo $_SESSION['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="receiver">Destinataire</label>
                            <input type="text" class="form-control" id="receiver" name="receiver" placeholder="Destinataire">
                        </div>
                        <div class="form-group">
                            <label for="add_message">Message</label>
                            <textarea class="form-control" id="add_message" name="add_message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="form_message">Envoyer</button>
                    </form>
                    <?php
                }
                else
                {
                    ?>
                    <p>Vous devez être connecté pour envoyer un message</p>
                    <?php
                }
                ?>
            </div>
        </div>

        <br><br><br>

        <div class="row">
            <div class="col-md-12">
                <h1>Messages reçus</h1>
                <?php
                if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id']) 
                {
                    $msg = $db->prepare('SELECT * FROM private_msg LEFT JOIN users ON private_msg.sender = users.id WHERE receiver = ? ORDER BY private_msg.id DESC');
                    $msg->execute(array($_SESSION['id']));
                    $msg_nbr = $msg->rowCount();
                    if($msg_nbr == 0)
                    {
                        ?>
                        <p>Vous n'avez reçu aucun message</p>
                        <?php
                    }
                    else
                    {
                        while($msg_data = $msg->fetch())
                        {
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $msg_data['username']; ?></h5>
                                    <p class="card-text"><?php echo $msg_data['message']; ?></p>
                                    <a href="../../Models/prv_msg/delete_private_message.php?id=<?php echo $_SESSION['id']; ?>&delete=<?php echo $msg_data['id']; ?>" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                else
                {
                    ?>
                    <p>Vous devez être connecté pour voir vos messages</p>
                    <?php
                }
                ?>
            </div>
</body>
</html>