<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styyle_tweet.css">
<!-- 
    <link rel="stylesheet" href="Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="Skeleton-2.0.4/css/skeleton.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <script text="text/javascript" src="corre_tweets.js"></script>
    <title>tweet_academie</title>
</head>
<body>
        <h4>Tweets</h4>
        <p class="test">testestetestetstes</p>
            <form enctype="multipart/form-data" method="POST" id="tkt" class="tweets-form">
                <textarea type="text" name="content" id="content" placeholder="content..." maxlength = "140" required></textarea>
                    <br>
                <input type="file" name="url" id="url">
                <button>
                    <img class="form-loader" src="assets/Spinner-1s-200px.gif" width="20px" alt="chargement" hidden>
                    <span class="tweets_status">Envoie</span>
                </button>
            </form>

            <div class="container">
                <div class="row">
                    <div class="col order-first">
                    <h5>autres mettez ce que vous voulez : x)</h5>
                    <!--partie code -->
                        <nav class="nav flex-column">
                            <?php
                                if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id'])
                                {
                                    ?>
                                        <a class="nav-link" aria-current="page" href="tweet_control.php?id=<?=$_SESSION['id']?>">
                                            <img class="svg" src="../membres/icone/home.png" alt="accueil icone">
                                        </a>
                                        <a class="nav-link" href="../My_profil.php?id=<?=$_SESSION['id']?>">
                                            <img class="svg" src="../membres/icone/utilisateur.png" alt="profil icone">
                                        </a>
                                        <a class="nav-link" href="../deconnexion.php">
                                            <img class="svg" src="../membres/icone/exit.png" alt="exit icone">
                                        </a>
                                        <a class="nav-link" href="../private_message.php?id=<?=$_SESSION['id']?>">
                                            <img class="svg" src="../membres/icone/enveloppe.png" alt="message icone">
                                        </a>
                                    <?php
                                }
                                else
                                {
                                    header('Location: ../../routeur.php');
                                    ?>
                                        <a class="nav-link" href="connexion.php">Connexion</a>
                                    <?php
                                }
                                ?>
                            <!-- <a class="nav-link active" aria-current="page" href="#">Active</a>
                            <a class="nav-link" href="#">Link</a>
                            <a class="nav-link" href="#">Link</a> -->
                            <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                        </nav>
                    <!--partie code -->
                    </div>
                    <div class="col">
                        <h5>Tweets :</h5>
                        <br>
                    <!--partie code -->
                        <div class="tweets">
                            <?php
                            while($reponse=$allComment->fetch(PDO::FETCH_OBJ))
                            {
                            ?>
                                <div class="comment-item">
                                    <p>
                                        <b><?= $reponse->username;?> (<?= $reponse->date; ?>) <p hidden><?= $reponse->id; ?></p>
                                        </b>    
                                        <p><?= $reponse->content; ?></p>
                                        <?php
                                            if($reponse->url_picture != NULL)?>
                                            <img src="<?=$reponse->url_picture;?>" alt="">
                                    </p>
                                </div>

                                <?php
                                    $likes = $db->prepare("SELECT id FROM tweet_like WHERE tweet_id = ?;");
                                    $likes->execute(array($reponse->id));
                                    $likes = $likes->rowCount(); // essayer de bouger du template vers models 
                                ?>
                                <span class="likes" onclick="like_update('<?=$reponse->id?>')"><img class="svg-light" src="../membres/icone/void_like.png" alt="heart for like"> (<span id="like_loop_<?=$reponse->id?>"><?=$likes?></span>)</span>
                                <a href="../comments.php?id=<?=$reponse->id?>">comments</a>
                            <?php
                            };
                            ?>
                        </div>
                    <!--fin partie code -->
                    </div>
                    <div class="col order-last">
                    <h5>hashtag les plus populaires :</h5>
                    </div>
                </div>
            </div>
    <script>
        function like_update(id)
        {
            $.ajax({
                url: '../../Models/likes/likes_action.php',
                type: 'POST',
                data: {
                    id: id,
                    like: 1
                },
                success: function(data)
                {
                    console.log("success add_like");
                    $.ajax({
                        url: '../../Models/likes/likes_number.php',
                        type: 'GET',
                        data: {
                            id: id
                        },
                        datatype: 'json',
                        success: function(response)
                        {
                            console.log("success NBR likes with " + response);
                            console.log(id);
                            $("#like_loop_"+ id).html(response);
                        }
                    })
                }
            });
        }
    </script>
</body>
</html>