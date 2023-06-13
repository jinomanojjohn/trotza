<?php
include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-200 top-0"
    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <?php include '../includes/sidebar.php';
  sideBar('');
  ?>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-light" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-light active" aria-current="page">Profile</li>
          </ol>
          <h6 class="font-weight-bolder text-light mb-0">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  ms-md-auto pe-md-3 d-flex align-items-center">
            <li class="nav-item d-flex align-items-center border-2">
              <button onclick="window.location.href='profile.php'"
                class="btn btn-light btn-md font-weight-bold  mb-0"><i
                  class="fa fa-user me-sm-1"></i>&nbsp;&nbsp;Profile</button>
            </li>
            <li class="nav-item d-flex align-items-center bg-danger mx-2 rounded">
              <button onclick="window.location.href='logout.php'" class="btn btn-md font-weight-bold text-white mb-0"><i
                  class="fa fa-lock me-sm-1"></i>&nbsp;&nbsp;Logout</button>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php
    if ($_SESSION['UserType'] == 'admin') {
      ?>
      <div class="card shadow-lg mt-5 mx-4 card-profile-bottom">
        <div class="card-body p-3">
          <div class="row gx-4">
            <hr class="horizontal dark my-5">
            <div class="card card-body mx-3 mx-md-4 mt-n6 ">
              <div class="col-auto my-auto">
                <div class="h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 align-items-center">
                        <h6 class="mb-0">Profile Information</h6>
                      </div>
                      <?php
                      $query = "SELECT * FROM login where type='admin'";
                      $result = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($result)
                        ?>
                      <div class="col-md-4 text-end">
                        <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit Profile" data-target="#edit"
                          onclick="getData(<?php echo $row['id']; ?>)"><i
                            class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                  <div class="card-body p-3">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">
                          Name:</strong> &nbsp;
                        Admin
                      </li>
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">
                          Username:</strong> &nbsp;
                        <?php echo $row["username"]; ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade" id="edit" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="../includes/editadmin.php" method="POST">

                    <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control p-2" id="email" name="email" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control p-2" id="password" name="password"
                          placeholder="Enter New Password">
                      </div>
                    </div>
                    <div class=" modal-footer border-top-0 d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
    } else {
      ?>
            <div class="card shadow-lg mt-5 mx-4 card-profile-bottom">
              <div class="card-body p-3">
                <div class="row gx-4">
                  <hr class="horizontal dark my-5">
                  <div class="card card-body mx-3 mx-md-4 mt-n6 ">
                    <div class="col-auto my-auto">
                      <div class="h-100">
                        <div class="card-header pb-0 p-3">
                          <div class="row">
                            <div class="col-md-8 align-items-center">
                              <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <?php
                            $query = "SELECT * FROM login inner join faculty_data fd on login.id=fd.fid where type='faculty' and login.id={$_SESSION["LoginTeacher"]}";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($result)
                              ?>
                            <div class="col-md-4 text-end">
                              <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Edit Profile" data-target="#edit"
                                onclick="getFData(<?php echo $row['id']; ?>)"><i
                                  class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-xl-4">
                      <div class="card card-plain h-100">
                        <div class="card-body p-3">
                          <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">
                                Name:</strong> &nbsp;
                              <?php echo $row["name"]; ?>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">
                                Username:</strong> &nbsp;
                              <?php echo $row["username"]; ?>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">
                                Mobile Number:</strong> &nbsp;
                              <?php echo $row["mobile"]; ?>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="modal fade" id="edit" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Admin Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <form action="../includes/editfdata.php" method="POST">

                          <div class="modal-body">
                            <div id="errormsg2">
                            </div>
                            <input type="hidden" name="id" id="fid">
                            <div class="form-group">
                              <label for="ename">Faculty Name</label>
                              <input type="text" class="form-control px-2" id="ename" name="name"
                                placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="eemail">Email</label>
                              <input type="email" class="form-control px-2" id="eemail" name="email"
                                placeholder="Enter Email Address">
                            </div>
                            <div class="form-group">
                              <label for="emobile">Mobile Number</label>
                              <input type="mobile" class="form-control px-2" id="emobile" name="mobile"
                                placeholder="Enter Mobile Number">
                            </div>
                            <div class="form-group">
                              <label for="epass">Password</label>
                              <input type="password" class="form-control px-2" id="epass" name="pass"
                                placeholder="Enter Password">
                            </div>
                          </div>
                          <div class=" modal-footer border-top-0 d-flex justify-content-center">
                            <button name="profile" type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <!--   Core JS Files   -->
                <script src="../assets/js/core/popper.min.js"></script>
                <script src="../assets/js/core/bootstrap.min.js"></script>
                <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
                <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
                <script>
                  var win = navigator.platform.indexOf('Win') > -1;
                  if (win && document.querySelector('#sidenav-scrollbar')) {
                    var options = {
                      damping: '0.5'
                    }
                    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                  }
                </script>
                <!-- Modal scripts -->
                <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js">
                </script>
                <!-- Github buttons -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
                <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

                <script>

                  function getData(id) {
                    const email = document.getElementById('email');
                    // const password = document.getElementById('password');

                    $.ajax({
                      url: "../includes/getadmin.php?id=" + id,
                      type: "GET",
                      success: function (data) {
                        var data = JSON.parse(data);
                        email.value = data[0].username;
                        password.value = data[0].password;
                      }
                    });
                  }
                  function getFData(id) {
                    const name = document.getElementById('ename');
                    const email = document.getElementById('eemail');
                    const mobile = document.getElementById('emobile');
                    const fid = document.getElementById('fid');
                    const pass = document.getElementById('epass');

                    $.ajax({
                      url: "../includes/getfdata.php",
                      type: "GET",
                      data: { id: id },
                      success: function (data) {
                        var parsedData = JSON.parse(data);
                        if (parsedData.length > 0) {
                          fid.value = parsedData[0].fid;
                          name.value = parsedData[0].name;
                          email.value = parsedData[0].email;
                          mobile.value = parsedData[0].mobile;
                          pass.value = parsedData[0].password;
                          // console.log(parsedData);
                        } else {
                          console.log("No data found for the specified ID.");
                        }
                      },
                      error: function () {
                        console.log("Error occurred during the AJAX request.");
                      }
                    });
                  }

                  const editValidate = () => {
                    const name = document.getElementById('ename');
                    const email = document.getElementById('eemail');
                    const mobile = document.getElementById('emobile');
                    const pass = document.getElementById('epass');
                    if (name.value == "") {
                      name.focus();
                      document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Name is required</span></div>"
                      return false;
                    }
                    if (email.value == "") {
                      email.focus();
                      document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Email is required</span></div>"
                      return false;
                    }
                    if (mobile.value == "" && mobile.value.length != 10) {
                      mobile.focus();
                      document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Mobile number is required</span></div>"
                      return false;
                    }
                    if (pass.value == "") {
                      pass.focus();
                      document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Password is required</span></div>"
                      return false;
                    }
                  }


                </script>
</body>

</html>