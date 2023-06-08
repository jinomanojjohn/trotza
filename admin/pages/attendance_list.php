<?php
include '../includes/connection.php';
session_start(); // Start a new session

// Check if the user is already logged in
// if (!isset($_SESSION['admin_loggedin'])) {
//     header("location: ../admin/"); // Redirect to dashboard if already logged in
//     exit;
// }
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
  <!-- <div class="min-height-150 bg-primary position-absolute w-100"></div> -->

  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">TROTZA</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="faculty_list.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Faculty</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="student_list.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="attendance_list.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Attendance</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="marks.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-certificate text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Mark</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="fees.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-money text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Fees</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="class.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tasks text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Class</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="subject.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-book text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Subject</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Attendance</li>
          </ol>
          <h6 class="font-weight-bolder text-dark mb-0">Attendance</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  ms-md-auto pe-md-3 d-flex align-items-center">
            <li class="nav-item d-flex align-items-center border-2">
              <button onclick="window.location.href='profile.php'" class="btn btn-outline-primary btn-md font-weight-bold  mb-0"><i class="fa fa-user me-sm-1"></i>&nbsp;&nbsp;Profile</button>
            </li>
            <li class="nav-item d-flex align-items-center bg-danger mx-2 rounded">
              <button onclick="window.location.href='logout.php'" class="btn btn-md font-weight-bold text-white mb-0"><i class="fa fa-lock me-sm-1"></i>&nbsp;&nbsp;Logout</button>
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
                <h6 class="text-white ps-3 pt-2 text-uppercase">Attendance List</h6>
                <button class="btn bg-gradient-dark m-0 toast-btn" type="button" data-toggle="modal" data-target="#form"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Attendance</button>
              </div>
            </div>
            <div class="card-body px-0 pt-3 pb-2">
              <div class="table-responsive p-0">
                <table class="align-items-center mb-0 w-100 d-block d-md-table text-sm">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7" style="width: 25%;">
                        Date</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2" style="width: 25%;">
                        Class</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 th-sm" style="width: 25%;">
                        Faculty</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7" style="width: 25%;">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT am.aid,am.adate,am.class,fd.name FROM attendance_master am inner join faculty_data fd on am.fid=fd.fid";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td class="align-middle text-center">
                          <div class="d-flex flex-column ">
                            <h6 class="mb-0 text-sm">
                              <?php echo $row["adate"]; ?>
                            </h6>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <p class="font-weight-bold mb-0">
                            <?php echo $row["class"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="font-weight-bold mb-0">
                            <?php echo $row["name"]; ?>
                          </p>
                        </td>
                        <td>
                          <a class="btn btn-link text-dark px-3 mb-0" type="button" href="edit_attendance.php?aid=<?php echo $row["aid"]; ?>&dt=<?php echo $row["adate"]; ?>&&class=<?php echo $row["class"]; ?>"><i class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
                          <a class="btn btn-link text-dark px-3 mb-0" href="view_attendance.php?aid=<?php echo $row["aid"]; ?>&dt=<?php echo $row["adate"]; ?>&&class=<?php echo $row["class"]; ?>"><i class="fas fa-eye text-dark me-2"></i>View</a>
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
  <div class="modal fade" id="form" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Add New Attendence</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="attendance_mark.php" method="POST" enctype="multipart/form-data" onsubmit="return formValidate()">

          <div class="modal-body">
            <div id="errormsg">
            </div>

            <div class="form-group">
              <label for="name">Date</label>
              <input type="date" class="form-control" id="atdate" name="dt" value="<?php echo date('Y-m-d'); ?>" min="2023-01-01" max="2023-12-31">
            </div>
            <div class="form-group">
              <label for="email">Class</label>
              <select name="class" id="class" class="form-control" placeholder="select class">
                <option value="0">Select Class</option>
                <?php
                $result1 = mysqli_query($conn, "select * from class");
                while ($row = mysqli_fetch_array($result1)) {
                ?>
                  <option value="<?php echo $row['cid']; ?>"><?php echo $row['clname']; ?></option>
                <?php
                }
                ?>
              </select>
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

    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    document.getElementById("atdate").max = maxDate;
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
    // document.getElementById('atdate').value = Date();
    const formValidate = () => {
      const cls = document.getElementById('class');
      if (cls.value == 0) {
        alert("please select class")
        return false;
      }
    }
  </script>
</body>

</html>