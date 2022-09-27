<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style_comments.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <script text="text/javascript" src="../Models/comments/script_comment.js"></script>
    <title>Comments</title>
</head>
<body>
    <div class="tweet">
        <p>
            <b><?= $reponse->username;?> ( <?= $reponse->date; ?> )
            </b>    
            <p><?= $reponse->content; ?></p>
        </p>
    </div>

    <form class="comments_send" method="POST"> <!--action="../Models/comments/add_comments.php"-->
        <textarea name="content" id="content" cols="50" rows="2" placeholder="comments..."></textarea><br>
        <input type="text" name="id_tweet" id="id_tweet" value="<?=$id_tweet?>" hidden>
        <!-- <input class="comments_status" type="submit" value="send"> -->
        <button type="submit"><span class="comments_status">Send</span> </button>
    </form>

    <br><br>

    <div class="comments">
        <?php
        while($rep_comments=$allComment->fetch(PDO::FETCH_OBJ))
        {
        ?>
            <div class="comment-item">
                <p>
                    <b><?= $rep_comments->username;?> ( <?= $rep_comments->date; ?> ) <p hidden><?= $rep_comments->id; ?></p>
                    </b>    
                    <p><?= $rep_comments->content; ?></p>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>