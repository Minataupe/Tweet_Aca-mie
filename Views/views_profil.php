<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Views/style_profil.css" rel="stylesheet">
    <link href="../Views/style_tweetProfil.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Tweet_academie</title>
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
                    <a class="nav-link"  href="private_message.php?id=<?=$_SESSION['id']?>">Message</a>
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
                <a class="nav-link"  href="tweets/tweet_control.php?id=<?=$_SESSION['id']?>">tweet</a>
            </li>
        </ul>
  
  
    </nav>
    <br>
    <!--formulaire-->
    <div align = center class="follow">
    <div class="container">
        <div class="row">
<h1><?=$user_info['username']?> Profil</h1>
<!-- code start -->
<div class="twPc-div">
    <a class="twPc-bg twPc-block"style="background-image: url('../Controllers/membres/banners<?php echo $user_info['banner'];?>');" width="100px" height="95"></a>

	<div>
		<div class="twPc-button">   
		</div>

		<a title="" href="#" class="twPc-avatarLink">
        <img src="../Controllers/membres/avatar<?php echo $user_info['avatar'];?> "width="75px" height="75px">
		</a>

        </br>
        </br>
        </br>
		<div class="twPc-divUser">
        <div>
            <?php
            if($get_id != $_SESSION['id'] ){

                if($isFollowingOrNot == 1){
                   
                echo "<a href='../Models/follow/follow.php?followedid=$get_id' class='twitter-follow-button' data-show-count='false' data-size='large' data-show-screen-name='false' data-dnt='true'><img src='../Controllers/membres/icone/twitter-free-icon-font.png' width='18'>Unfollow</a>";
                
            }else{
                echo "<a href='../Models/follow/follow.php?followedid=$get_id' class='twitter-follow-button' data-show-count='false' data-size='large' data-show-screen-name='false' data-dnt='true'><img src='../Controllers/membres/icone/twitter-free-icon-font.png' width='18'>Follow</a>";
            }
        }
        
            
            ?>
        </div>
            <div class="twPc-divName">       
                <a href="#"><?=$user_info['username']?></a>
			</div>
            
				<span>
				<a href="#">@<span><?=$user_info['username']?></span></a>
				</span>
		</div>

		<div class="twPc-divStats">
            <div align= center>
            Bio : <?php echo $user_info['bio']?>
          
            </div>
			<ul class="twPc-Arrange">
                <li class="twPc-ArrangeSizeFit">
					<a href="#" title="Following">
						<span class="twPc-StatLabel twPc-block">Followers</span>
                        <?php
                        echo '<a href="../Views/display_follow.php?id='.$_SESSION['id'].'">'.$following_Count.'</a>';
                        ?>
						<span class="twPc-StatValue"></span>
					</a>
				</li>
				<li class="twPc-ArrangeSizeFit">
					<a href="#" title="Followers">
						<span class="twPc-StatLabel twPc-block">Followings</span>
						<span class="twPc-StatValue"><?php
                        echo '<a href="../Views/display_follow.php?id='.$_SESSION['id'].'">'.$followers_Count.'</a>';                
                        ?></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- code end -->
</div>
</div>

</body>
</html>