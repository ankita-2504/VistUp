<!DOCTYPE html>

<html lang="en">

  <head>

		<title>VisitUp Clinic Login</title>

		<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>VisitUp</title>

    <!-- plugins:css -->

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->

    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="assets/css/all.min.css">

    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">

    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">

    <!-- End plugin css for this page -->

    <!-- inject:css -->

    <!-- endinject -->

    <!-- Layout styles -->

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- End layout styles -->

    <link rel="shortcut icon" href="assets/images/favicon.png" />

	</head>

  <body>

      <div class="login-page">

        <div class="row">

          <div class="col-md-6">

            

           <div class="login-bg-color">

            <div class="left-site position-relative">

            

            <div class="login-img">

              <img src="assets/images/doctor-img1.png" class="w-100">

            </div>

            </div>

           </div>

          </div>

          <div class="col-md-6">

            <div class="white-bg form-section">

              <div class="w-100 h-100 form-ar d-flex align-items-center">

                <div>

              <div class="d-flex align-items-center pb-5">

                <div class="c-logo">

                  <img src="assets/images/logo.png">

                </div>

                <div class="c-logo-text">

                  <h2>VisitUp Clinic Private Limited</h2>

                </div>

             </div>
			<div id="log">
             <div class="wlc-text">

              <h3>Hello!</h3><br>
				Signed In Successfully!!
              Login to Your Account

             </div>
				
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="formvalidate">

                <div class="input-group">

                  <label class="palceholder" for="userName">User Name</label>

                  <input class="form-control" name="userName" id="userName" type="text" placeholder="" />

                  <span class="input-icon"><i class="fa-sharp fa-solid fa-user"></i></span>

                  <span class="lighting"></span>

                </div>

                <div class="input-group">

                  <label class="palceholder" for="userPassword">Password</label>

                  <input class="form-control" name="userPassword" id="userPassword" type="password" placeholder="" />

                  <span class="input-icon"><i class="fa-solid fa-key"></i></span>

                  <span class="lighting"></span>

                </div>

          

                <button type="submit" id="login" name="logging">Login</button>
				<button type="button" onclick="show();"  id="login">Sign Up</button>
				</form>
			</div>
			
				<script>
					function show()
					{
						location.href='signup.php'
						  
					}
				</script>
                <!-- <div class="clearfix supporter">

                  <div class="pull-left remember-me">

                    <input id="rememberMe" type="checkbox">

                    <label for="rememberMe">Remember Me</label>

                  </div>

                  <a class="forgot pull-right" href="#">Forgot Password?</a>

                </div> -->

              

              </div>

              </div>

				
				<?php include 'connection.php';
					 if(isset($_POST['logging'])) {
						$user=$_POST["userName"];
						$passwd=$_POST["userPassword"];
						$sql="SELECT * FROM users WHERE User_Name='$user' AND Password='$passwd'";
						$result=$conn->query($sql);
						$flag=0;
						if ($result->num_rows>0)
						{
							$row = $result->fetch_assoc();
							$_SESSION["cus"]["Userid"] = $row["User_Id"];
							$_SESSION["cus"]["name"] = $row["First_Name"] ." ".$row["Last_Name"];
							$_SESSION["cus"]["Contact"] = $row["Contact"];
							$_SESSION["cus"]["Role"] = $row["Role"];
							$_SESSION["cus"]["login"] = "true";
							$f = $row["First_Name"];
							$n = $row["Last_Name"];
							$flag = 1;
							$usid=$_SESSION["cus"]["Userid"];
							
							$sql2="SELECT * FROM `login_logout_timings` order by cast(SUBSTRING(`Login_Id`, 4,length(`Login_Id`)-3) as UNSIGNED) DESC LIMIT 1;";
							$result2=$conn->query($sql2);
							$i=0;
							while($row=$result2->fetch_assoc())
							{
								$d_id = $row["Login_Id"];
								$l=strlen($d_id);
								$st=substr($d_id, 0,3);
								$d=substr($d_id, 3,$l);
								$d=$d+1;
								$id=$st.$d;
								$i++;
							}
							if($i==0)
							{
								$id='L001';
							}
							
							date_default_timezone_set("Asia/Kolkata");
							$logd=date("d-m-Y");
							$logt=date("H:i:s");
							
							
							$abc="INSERT INTO `login_logout_timings`(`Login_Id`, `User_Id`, `Login_Date`, `Login_Time`) VALUES ('$id','$usid','$logd','$logt')";
							if ($conn->query($abc) === TRUE) 
							{
			
								$_SESSION["cus"]["Loginid"]= $id;
								
							}
							
							
							echo "<script>location.href='dashboard.php'</script>";

						}

						else

						{

							$result = '<p style="position:absolute; bottom: 150px; right: 270px; color: #FF0000; font-weight: bold">Wrong username or password</p>';

							echo $result;

						}

						$conn -> close();

					}		

				?>



            </div>

          </div>

          </div>

        </div>

     





        <script src="assets/vendors/js/vendor.bundle.base.js"></script>

        <!-- endinject -->

        <!-- Plugin js for this page -->

        <script src="assets/vendors/chart.js/Chart.min.js"></script>

        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>

        <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>

        <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>

        <!-- End plugin js for this page -->

        <!-- inject:js -->

        <script src="assets/js/chart.js"></script>

        <script src="assets/js/off-canvas.js"></script>

        <script src="assets/js/hoverable-collapse.js"></script>

        <script src="assets/js/misc.js"></script>

        <script src="assets/js/settings.js"></script>

        <script src="assets/js/todolist.js"></script>

        <!-- endinject -->

        <!-- Custom js for this page -->

        <script src="assets/js/dashboard.js"></script>

    <script>

      + function($) {

  $('.palceholder').click(function() {

    $(this).siblings('input').focus();

  });



  $('.form-control').focus(function() {

    $(this).parent().addClass("focused");

  });



  $('.form-control').blur(function() {

    var $this = $(this);

    if ($this.val().length == 0)

      $(this).parent().removeClass("focused");

  });

  $('.form-control').blur();



  // validetion

  $.validator.setDefaults({

    errorElement: 'span',

    errorClass: 'validate-tooltip'

  });



  $("#formvalidate").validate({

    rules: {

      userName: {

        required: true,

        minlength: 6

      },

      userPassword: {

        required: true,

        minlength: 6

      }

    },

    messages: {

      userName: {

        required: "Please enter your username.",

        minlength: "Please provide valid username."

      },

      userPassword: {

        required: "Enter your password to Login.",

        minlength: "Incorrect login or password."

      }

    }

  });



}(jQuery);

    </script>

  </body>

</html>