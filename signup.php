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
			
			<div id="sig">
             <div class="wlc-text">

              <h3>Hello!</h3><br>

              Sign In to Your Account

             </div>
			  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="formvalidate">

				<div class="input-group">

                  <label class="palceholder" for="userPassword">First Name</label>

                  <input class="form-control" name="fname" id="userPassword" type="text" placeholder="" />

                  <span class="input-icon"><i class="fa-solid fa-user-circle"></i></span>

                  <span class="lighting"></span>

                </div>
				<div class="input-group">

                  <label class="palceholder" for="userPassword">Last Name</label>

                  <input class="form-control" name="lname" id="userPassword" type="text" placeholder="" />

                  <span class="input-icon"><i class="fa-solid fa-user-circle"></i></span>

                  <span class="lighting"></span>

                </div>
				<div class="input-group">

                  <label class="palceholder" for="userPassword">Contact</label>

                  <input class="form-control" name="phone" id="userPassword" type="number" placeholder="" />

                  <span class="input-icon"><i class="fa-solid fa-phone"></i></span>

                  <span class="lighting"></span>

                </div>

          
              
                <div class="input-group">

                  <label class="palceholder" for="userName">User Name</label>

                  <input class="form-control" name="user" id="userName" type="text" placeholder="" />

                  <span class="input-icon"><i class="fa-sharp fa-solid fa-user"></i></span>

                  <span class="lighting"></span>

                </div>

                <div class="input-group">

                  <label class="palceholder" for="userPassword">Password</label>

                  <input class="form-control" name="password" id="userPassword" type="password" placeholder="" />

                  <span class="input-icon"><i class="fa-solid fa-key"></i></span>

                  <span class="lighting"></span>

                </div>
				
					<input class="btn btn-warning mr-2" type="button" id="login" onclick="show();" value="Back To Login" />
				 
                 <input name="adding" class="btn btn-warning mr-2" type="submit" id="login" value="Create Account" />
				 </form>

			</div>

				<script>
					function show()
					{
						location.href='index.php'
						  
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

				<?php if(isset($_POST['adding'])) 
				{
																	
					include 'connection.php';
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					
					$phone = $_POST['phone'];
					
					
					$user = $_POST['user'];
					$password = $_POST['password'];
					$cdate = date("Y-m-d");
					//$permissionsarr = $_POST["permissions"];
					$newvalues = "Booking,Doctor Timings";
					
					
						$sql2="SELECT * FROM `users` order by cast(SUBSTRING(`User_Id`, 4,length(`User_Id`)-3) as UNSIGNED) DESC LIMIT 1";
						$result2 = $conn->query($sql2);
						$i=0;
						while($row=$result2->fetch_assoc())
						{
							$dd_id = $row["User_Id"];
							$l = strlen($dd_id);
							$st = substr($dd_id, 0,3);
							$d = substr($dd_id, 3,$l);
							$q = number_format($d);
							$d=$q+1;
							$id = $st.$d;
							$i++;
						}
						if($i==0)
						{
							$id='U001';
						}
						
						$s="INSERT into users(User_Id, User_Name, Password, First_Name, Last_Name, Contact, Role, Creation_Date,Permissions) 
							VALUES ('$id', '$user', '$password', '$fname', '$lname', '$phone', 'Patient', '$cdate', '$newvalues');";
					
					if ($conn->query($s) === TRUE)
					{ 
						echo "<script>location.href='index2.php'</script>";
					} 
					 else 
					 {
						
					}
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