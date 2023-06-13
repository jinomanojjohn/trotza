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
    TROTZA | FACULTIES
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

<body class="g-sidenav-show   bg-gray-100">
  <!-- Modal -->
  <div class="modal fade" id="edit" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Edit Faculty details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="../includes/editfdata.php" method="POST" enctype="multipart/form-data"
          onsubmit="return editValidate()">

          <div class="modal-body">
            <div id="errormsg2">
            </div>
            <input type="hidden" name="id" id="fid">
            <div class="form-group">
              <label for="ename">Faculty Name</label>
              <input type="text" class="form-control px-2" id="ename" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="eemail">Email</label>
              <input type="email" class="form-control px-2" id="eemail" name="email" placeholder="Enter Email Address">
            </div>
            <div class="form-group">
              <label for="emobile">Mobile Number</label>
              <input type="mobile" class="form-control px-2" id="emobile" name="mobile"
                placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
              <label for="epass">Password</label>
              <input type="text" class="form-control px-2" id="epass" name="pass" placeholder="Enter Password">
            </div>
          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../includes/sidebar.php'; 
  sideBar('faculty');
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Faculties</li>
          </ol>
          <h6 class="font-weight-bolder text-dark mb-0">Faculties</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  ms-md-auto pe-md-3 d-flex align-items-center">
            <li class="nav-item d-flex align-items-center border-2">
              <button onclick="window.location.href='profile.php'"
                class="btn btn-outline-primary btn-md font-weight-bold  mb-0"><i
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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">

            <div class="card-header p-0 position-relative mt-n4 mx-4">
              <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg p-3">
                <h6 class="text-white ps-3 pt-2 text-uppercase">Faculty List</h6>
                <button class="btn bg-gradient-dark m-0 toast-btn" type="button" data-toggle="modal"
                  data-target="#form"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New
                  Faculty</button>
              </div>
            </div>
            <div class="card-body px-0 pt-3 pb-2">
              <div class="table-responsive p-0">
                <table class="align-items-center mb-0 w-100 d-block d-md-table text-sm">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"
                        style="width: 15%;">
                        Name</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2"
                        style="width: 15%;">
                        Email</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 th-sm"
                        style="width: 15%;">
                        Mobile</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"
                        style="width: 35%;">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM faculty_data inner join login on faculty_data.fid=login.id and login.type='faculty' where login.status!=2";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td class="align-middle text-center">
                          <div class="d-flex flex-column ">
                            <h6 class="mb-0 text-sm">
                              <?php echo $row["name"]; ?>
                            </h6>
                          </div>

                        </td>
                        <td class="align-middle text-center">
                          <p class="font-weight-bold mb-0">
                            <?php echo $row["email"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="font-weight-bold mb-0">
                            <?php echo $row["mobile"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <?php
                          if ($row["status"] == 1) {
                            ?>
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                              href="../includes/fdeactivate.php?id=<?php echo $row["fid"]; ?> & d=0">
                              <i class="fas fa-ban me-2"></i>Deactivate
                            </a>
                            <?php
                          } else {
                            ?>
                            <a class="btn btn-link text-success text-gradient px-3 mb-0"
                              href="../includes/fdeactivate.php?id=<?php echo $row["fid"]; ?> & d=1">
                              <i class="fas fa-thumbs-up me-2"></i>Activate
                            </a>
                            <?php
                          }
                          ?>

                          <a class="btn btn-link text-dark px-3 mb-0" type="button" data-toggle="modal"
                            data-target="#edit" onclick="getData(<?php echo $row['fid']; ?>) "><i
                              class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>

                          <a class="btn btn-link text-dark px-3 mb-0"
                            href="../includes/fdeactivate.php?id=<?php echo $row["fid"]; ?> & d=2"><i
                              class="fas fa-trash-alt text-dark me-2"></i>Delete</a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="form" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Add New Faculty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../includes/fdata.php" method="POST" enctype="multipart/form-data"
          onsubmit="return formValidate()">

          <div class="modal-body">
            <div id="errormsg">

            </div>

            <div class="form-group">
              <label for="name">Faculty Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Faculty Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="mobile">Mobile Number</label>
              <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Set Password">
            </div>
            <div class=" modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

      </div>
    </div>
  </div>




  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <!-- Modal scripts -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js">
  </script>

  <script>
    const formValidate = () => {
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const mobile = document.getElementById('mobile');
      const pass = document.getElementById('pass');
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

    function getData(id) {
      const name = document.getElementById('ename');
      const email = document.getElementById('eemail');
      const mobile = document.getElementById('emobile');
      const fid = document.getElementById('fid');
      // const pass = document.getElementById('epass');

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
            // pass.value = parsedData[0].password;
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