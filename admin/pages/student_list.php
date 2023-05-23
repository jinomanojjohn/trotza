<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    TROTZA | STUDENTS
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
  <!-- <div class="min-height-150 bg-primary position-absolute w-100"></div> -->
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
        target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">TROTZA</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faculty_list.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Faculties</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="student_list.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Fees</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Student</li>
          </ol>
          <h6 class="font-weight-bolder text-dark mb-0">Students</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  ms-md-auto pe-md-3 d-flex align-items-center">
            <li class="nav-item d-flex align-items-center border-2">
              <button onclick="window.location.href='profile.php'" class="btn btn-outline-primary btn-md font-weight-bold  mb-0"><i
                  class="fa fa-user me-sm-1"></i>&nbsp;&nbsp;Profile</button>
            </li>
            <li class="nav-item d-flex align-items-center bg-danger mx-2 rounded">
              <button onclick="window.location.href='logout.php'" class="btn btn-md font-weight-bold text-white mb-0"><i
                  class="fa fa-user me-sm-1"></i>&nbsp;&nbsp;Logout</button>
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
                <h6 class="text-white ps-3 pt-2 text-uppercase">Student List</h6>
                <button class="btn bg-gradient-dark m-0 toast-btn" type="button" data-toggle="modal"
                  data-target="#form"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New
                  Student</button>
              </div>
            </div>
            <div class="card-body px-0 pt-3 pb-2">
              <div class="table-responsive p-0">
                <table class="align-items-center mb-0 w-100 d-block d-md-table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 15%;">
                        Name</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                        style="width: 15%;">
                        Email</th>
                      <th
                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 th-sm"
                        style="width: 15%;">
                        Mobile</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Course</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 35%;">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <?php
                    // $query = "SELECT * FROM student";
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_array($result)) {
                    ?> -->
                    <tr>
                      <td class="align-middle text-center">
                        <div class="d-flex flex-column ">
                          <h6 class="mb-0 text-sm">
                            <!-- <?php echo $row["name"]; ?> -->
                            Riyas K H
                          </h6>
                        </div>

                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">
                          <!-- <?php echo $row["email"]; ?> -->
                          riyaskh123@gmail.com
                        </p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">
                          <!-- <?php echo $row["mobile"]; ?> -->
                          9834579324
                        </p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">
                          <!-- <?php echo $row["course"]; ?> -->
                          Web Development
                        </p>
                      </td>
                      <td class="align-middle text-center">
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"><i
                            class="fas fa-ban me-2"></i>Deactivate</a>
                        <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                            href="includes/studentdeactivate.php?id=<?php echo $row["sid"]; ?>"><i
                              class="material-icons text-sm me-2">delete</i>Deactivate</a> -->

                        <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-target="#edit"
                          onclick=""><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <!-- <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-target="#edit"
                            onclick="getData(<?php echo $row['sid']; ?>)"><i
                             class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> -->
                        
                        <a class="btn btn-link text-dark px-3 mb-0"
                          onclick=""><i class="fas fa-trash-alt text-dark me-2"></i>Delete</a>
                        <!-- <a class="btn btn-link text-dark px-3 mb-0"
                            href="includes/studentdelete.php?id=<?php echo $row["sid"]; ?>"><i
                              class="fas fa-trash-alt text-dark me-2"></i>Delete</a> -->
                      </td>
                    </tr>
                    <!-- <?php
                    // }
                    ?> -->
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
</body>

</html>