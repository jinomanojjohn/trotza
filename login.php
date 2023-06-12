<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "admin/includes/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
      $username=$_POST["email"];
      $password=$_POST["password"];

      $query="select * from login where username='$username' and password='$password' and status='1' ";
      $result=mysqli_query($conn,$query);
      if (mysqli_num_rows($result)>0) {
          while ($row=mysqli_fetch_array($result)) {
              if ($row["type"]=="admin")
              {
                  $_SESSION['LoginAdmin']=$row["id"];
                  $_SESSION['UserType']=$row['type'];
                  header('Location: admin/pages/dashboard.php');
              }
              else if ($row["type"]=="faculty")
              {
                  $_SESSION['LoginTeacher']=$row["id"];
                  $_SESSION['UserType']=$row['type'];
                  header('Location: admin/teacher/index.php');
              }
              else if ($row["type"]=="student")
              {
                  $_SESSION['LoginStudent']=$row['id'];
                  $_SESSION['UserType']=$row['type'];
                  header('Location: index.php');
              }
          }
      }
      else
      { 
          header("Location: login.php");
      }
  }
?>

<!-- HTML Starts Here -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Login Page
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="admin/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Log In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" action="login.php" method="POST">
                    <div class="mb-2">
                      <input type="email" name="email" class="form-control form-control-lg" required placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-1">
                      <input type="password" name="password" class="form-control form-control-lg" required placeholder="Password" aria-label="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="btnlogin" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log in</button>
                    </div>
                    <div class="text-center pt-4">
                      <p>Don't have an account? <a href="register.php" class="font-weight-bold">Sign up</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('admin/assets/img/login_bg.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"An Investment In Knowledge <br> Pays The Best Interest"</h4>
                <p class="text-white position-relative">Benjamin Franklin</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="admin/assets/js/core/popper.min.js"></script>
  <script src="admin/assets/js/core/bootstrap.min.js"></script>
  <script src="admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>