<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="951771991751-b3gjjknakf26q0i8jahp4atn6pq91vu7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
      if(empty($_POST['username']) || empty($_POST['pswd'])){
      echo "<script language='javascript'>alert('Please fill all the fields.')</script>";
      } 
      else
      {
      require('db.php');
      $username= $con -> real_escape_string($_POST['username']);
			$password = $con -> real_escape_string($_POST['pswd']);

      echo $username;
      echo $password;
      $query = "SELECT * FROM user WHERE username = '$username' AND pasword = '$password' LIMIT 1;";
      $res = mysqli_query($con, $query); 
      if (mysqli_num_rows($res) == 1){
          $rs = mysqli_fetch_array($res, MYSQLI_ASSOC);
          session_start();
          $_SESSION['login'] = true;
          header("Location: auth_session.php");
      }else{
          echo "<p>Invalid login information</p>";
          session_unset();
      }
    }
  }
  ?>

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign In to <strong>You Trend</strong></h3>
                  <p class="mb-4">Dance Classes For Everyone.</p>
                </div>
                <form action="login.php" method="post">
                  <div class="form-group first">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">

                  </div>
                  <div class="form-group last mb-4">
                    <input type="password" class="form-control" id="password" name="pswd" placeholder="Password">
                    
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                    <span class="ml-auto"><a href="../Registration/register.php" class="already-user">Not a User? Register!</a></span> 
                  </div>

                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  <span class="d-block text-center my-4 text-muted"> <strong>OR</strong></span>
                  
              <div class="social-login text-center "> 
                    <!-- <a href="#" class="facebook">
                      <span class="icon-facebook mr-3"></span> 
                    </a>
                    <a href="#" class="twitter">
                      <span class="icon-twitter mr-3"></span>  -->
                    </a> 
                    <!-- <div class =  "g-signin2 text-center "> -->
                      <a href="../index.html" class="g-signin2" style="text-align:center;">
                        <!-- <span class="icon-google mr-3"></span>  -->
                      </a>
                    <!-- <a href="#" class="google">
                      <span class="icon-google mr-3"></span> 
                    </a> -->
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>