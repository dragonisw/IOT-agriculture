<html>
	<head>
		<title>kungfuphp - Form đăng ký thành viên</title>
	</head>
	<body>
		<?php
		require_once("connection.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
                    $conn = mysqli_connect('localhost', 'root', '', '3973168_minhbinhnam');  
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
    
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
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
          <img src="images/VAALogo.PNG" alt="" style="padding-left: 40px">
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
                <a class="nav-link" href="login.php" style="font-size: 20px">Sign in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php" style="font-size: 20px">Sign up</a>
              </li>
            </ul>
            </ul>
  

            
            <div class="quote_btn-container">
              <form class="form-inline">
                
                <input type="q" type="text" placeholder="Tim kiem">
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
	<form action="register.php" method="post">
		<table>
			<tr>
				<td colspan="2">Form dang ky</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td>Ho Ten :</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Dang ky"></td>
			</tr>

		</table>

	</form>
	</body>
	</html>