<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="Skeleton-2.0.4/css/skeleton.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>tweet_academie</title>
</head>

<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script> -->
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                    
                    <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="email_connect">Email address</label>
                              <input type="email" name="email_connect" class="form-control" id="email_connect" aria-describedby="emailHelp" placeholder="Enter email" value="<?= (isset($email)) ? $email : ''?>" required>
                           </div>
                           <div class="form-group">
                              <label for="password_connect">Password</label>
                              <input type="password" name="password_connect" id="password_connect" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" required>
                           </div>
                           <br>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="form_connexion">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <!-- <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Signup using Google
                                 </a>
                              </p>
                           </div> -->
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="#" id="signup">Sign up here</a></p>
                           </div>
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
			</div>
			  <div id="second">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form action="" name="registration" method="POST">
                            <div class="form-group">
                               <label for="lastname">Last Name</label>
                               <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname" value="<?= (isset($lastname)) ? $lastname : ''?>" required>
                            </div>
                           <div class="form-group">
                              <label for="firstname">First Name</label>
                              <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" value="<?= (isset($firstname)) ? $firstname : ''?>" required>
                           </div>
                           <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="<?= (isset($email)) ? $email : ''?>" required>
                           </div>
                            <div class="form-group">
                                <label for="confirm_email">Confirm email:</label>
                                <input type="email" name="confirm_email" id="confirm_email" class="form-control" aria-describedby="emailHelp" placeholder="Confirm email" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" aria-describedby="emailHelp" placeholder="Enter username" value="<?= (isset($username)) ? $username : ''?>" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" aria-describedby="emailHelp" required>
                            </div>
                           <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"  class="form-control" aria-describedby="emailHelp" placeholder="Confirm Password">
                            </div>
                           <div class="col-md-12 text-center mb-3">
                                <button type="reset" class=" btn-block mybtn btn-primary tx-tfm">reset</button> <!-- class -> btn -->
                                <button type="submit" name="form_inscription" class=" btn btn-block mybtn btn-primary tx-tfm">Get Started For Free</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
                              </div>
                           </div>
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
                  </div>
			</div>
		</div>
      </div>   
         
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
</script>
<script src="my_scrip.js"></script>
</html>