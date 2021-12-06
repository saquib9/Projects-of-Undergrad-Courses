<?php
session_start();
include 'db.php';
$conn = OpenCon();
$CAT = $_SESSION['category'];
echo $CAT;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <!--<a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <<a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 02 966 14 56</a> -->
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@bracu.ac.bd</a> 
          </div>
            <?php if($_SESSION['category']=='L'){ ?>
          <div class="col-lFg-3 text-right">
            <a href="login.php" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="register.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
          </div>
            <?php } else { ?>
            <div class="col-lFg-3 text-right">
            <a href="logout.php" class="small mr-3"><span class="icon-unlock-alt"></span> Log Out</a>
               
          </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
        
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
           <a href="index.html" class="d-block">
              <img src="images/logo1.png" alt="Image" class="img-fluid">
            </a> 
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.html" class="nav-link text-left">Home</a>
                </li>
            
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <!--<div class="ml-auto">
            <div class="social-wrap">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div> -->
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login</h2>
              <p> Please sign up first if you don't have an account </p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form action="login.php" method="post">
                    <div class="row">
                        
                        <div class="col-md-12 form-group">
                            <label for="username">ID</label>
                            <input type="text" name="ID" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="Password" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                    </form>
                    
                    <?php 
                    $chk = false;
                    if(isset($_POST['ID'])){
                        $id = $_POST['ID'];
                        $pass = $_POST['Password'];
                        echo $id;
                        $query = "SELECT * FROM `users` WHERE `id` =$id and `pass`='$pass'";
                        echo $query;
                            $query_run = mysqli_query($conn,$query);
                            //echo mysqli_num_rows($query_run);
                            if($query_run)
                                {
                                $response = mysqli_fetch_assoc($query_run);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        $_SESSION['ID'] = $id;
                                        $_SESSION['password'] = $pass;
                                        if($response['STD']==1) $_SESSION['category']='S';
                                        elseif($response['FAC']==1) $_SESSION['category']='F';
                                        else{$_SESSION['category']='A';
                                             echo "<script> window.location.assign('about.php'); </script>";
                                            }
                                        $_SESSION['DEPT']=$response['DEPT'];
                                        //$_SESSION['category'];
                                        //echo '<script type="text/javascript">alert("Logged In")</script>';
                                        echo "<script> window.location.assign('index.php'); </script>";
                                    }
                            }
                        else '<script type="text/javascript">alert("Wrong ID or pass")</script>';
                    }
                    
                    ?>
                    
                </div>
            </div>
            

          
        </div>
    </div>

    


    

  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>