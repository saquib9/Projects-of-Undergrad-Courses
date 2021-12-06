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
  <title>Academics &mdash; Website by Colorlib</title>
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
            <a href="index.php" class="d-block">
              <img src="images/logo1.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
    

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form action="register.php" method="post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Name</label>
                            <input type="text" name="name" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="username">ID</label>
                            <input type="number" name="id" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="username">Department</label>
                            <input type="text" name="dept" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="pass" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Re-type Password</label>
                            <input type="password" name="pword2" class="form-control form-control-lg">
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <label for="pword2">Faculty</label>
                            <input type="radio" name="faculty" value="F" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Student</label>
                            <input type="radio" name="student" value="S" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                    </form>
                    
                    <?php
                        if(isset($_POST['register']))
                        {
                            $bracu_id=$_POST['id'];
                            $pass=$_POST['pass'];
                            $cpass=$_POST['pword2'];
                            $name = $_POST['name'];
                            $mail = $_POST['email'];
                            $dept = $_POST['dept'];
                            


                            if($pass==$cpass)
                            {
                                $query = "SELECT * FROM `users` WHERE `id` =$bracu_id";
                                echo $query;
                            $query_run = mysqli_query($conn,$query);
                            //echo mysql_num_rows($query_run);
                            if($query_run)
                                {
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
                                    }
                                    else
                                    {
                                        
                                        if(isset($_POST['admin'])){
                                        $query = "insert into `users`(`ID`, `NAME`, `DEPT`, `EMAIL`, `PASS`,`ADM`) values('$bracu_id','$name', '$dept', '$mail', '$pass',1)";
                                        $_SESSION['category'] = 'A';
                                        }
                                        
                                        else if(isset($_POST['faculty'])){
                                            $query = "insert into `users`(`ID`, `NAME`, `DEPT`, `EMAIL`, `PASS`,`FAC`) values('$bracu_id','$name', '$dept', '$mail', '$pass',1)";
                                            $_SESSION['category'] = 'F';
                                        }
                                        else {
                                            $query = "insert into `users`(`ID`, `NAME`, `DEPT`, `EMAIL`, `PASS`, `STD`) values('$bracu_id','$name', '$dept', '$mail', '$pass',1)";
                                            $_SESSION['category'] = 'S';
                                        }
                                        
                                        $query_run = mysqli_query($conn,$query);
                                        
                                        
                                        if($query_run)
                                        {
                                            echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
                                            $_SESSION['ID'] = $bracu_id;
                                            $_SESSION['password'] = $pass;
                                            $_SESSION['DEPT']=$dept;
                                            if($_SESSION['category'] != 'S') echo "<script> window.location.assign('about.php'); </script>";
                                            else echo "<script> window.location.assign('index.php'); </script>";
                                        }
                                        else
                                        {
                                            echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
                                            
                                        }
                                    }
                                }
                                else
                                {
                                    echo '<script type="text/javascript">alert("DB error")</script>';
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
                            }

                        }
                        else
                        {
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