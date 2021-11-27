<?php
session_start();
require_once("connection.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from users where username = '$username' and password = '$password' ";
            $conn = mysqli_connect('fdb33.awardspace.net', '3973168_minhbinhnam', 'minhbinhnam123', '3973168_minhbinhnam');  
			$query = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows(mysqli_query($query));
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.html
                header('Location: index.html');
			}
		}
	}
//Gọi file connection.php ở bài trước
	
?>



<!DOCTYPE html>

<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SunFarm</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="css/slick-theme.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/login.scss" rel="stylesheet" />
  <link href="css/login.css" rel="stylesheet" />

 
</head>

<body>

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section"  style="padding-top: 10px;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
          <img src="images/VAALogo.PNG" alt="" style="padding-left: 40px; background-image: none;">
          </a>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse " id="navbarSupportedContent" style="padding-right:30px">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html" style="font-size: 20px;">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html" style="font-size: 20px"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="features.html" style="font-size: 20px">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.html" style="font-size: 20px">Contact</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="login.php" style="font-size: 20px; background-color: black">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php" style="font-size: 20px">Sign up</a>
              </li>
            </ul>
            </ul>
  

            
            <div class="quote_btn-container">
              <form class="form-inline"  style="padding-top:17px">
                
                <input type="q" type="text" placeholder="Search">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> 
            </div>
          </div>
          <i class="fa fa-user" aria-hidden="true" style="font-size:40px; padding-right: 50px"></i>
          
          <i class="fa fa-bars" aria-hidden="true" style="font-size:40px; padding-right: 40px"></i>
        </nav>
        
      </div>
    </header>
    </div>
   
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/3.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>IOT agriculture</strong></h3>
            <p class="mb-4">Sign in to continue</p>
            <form action="login.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control"  id="password" name="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="btn_submit" value="Log In" class="btn btn-block btn-primary">
            </form>
            
           
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>