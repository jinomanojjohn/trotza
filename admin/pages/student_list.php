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
  <div class="min-height-150 bg-white position-absolute w-100"></div>

  <!-- Modal -->


  <?php include '../includes/sidebar.php';
  sideBar('student');
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Students</li>
          </ol>
          <h6 class="font-weight-bolder text-dark mb-0">Students</h6>
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
                <h6 class="text-white ps-3 pt-2 text-uppercase">Student List</h6>
                <button class="btn bg-gradient-dark m-0 toast-btn" type="button" data-toggle="modal"
                  data-target="#form"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New
                  Student</button>
              </div>
            </div>
            <div class="card-body px-0 pt-3 pb-2">
              <div class="table-responsive p-0">
                <table class="align-items-center mb-0 w-100 d-block d-md-table text-sm">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Name</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Email</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                        style="width: 5%;">
                        Class</th>
                      <th
                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 th-sm"
                        style="width: 10%;">
                        Mobile</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 15%;">
                        School</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Board</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Parent Name</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 10%;">
                        Parent Mobile Number</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                        style="width: 20%;">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT student_data.*, class.clname, login.status
                    FROM student_data
                    INNER JOIN login ON student_data.sid = login.id
                    INNER JOIN class ON student_data.class = class.cid
                    WHERE login.type = 'student' AND login.status != 2";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      $className = $row["clname"];
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
                          <div class="d-flex flex-column ">
                            <h6 class="mb-0 text-sm">
                              <?php echo $row["email"]; ?>
                            </h6>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $className ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $row["mobile"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $row["school"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $row["board"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $row["pname"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0">
                            <?php echo $row["pmobile"]; ?>
                          </p>
                        </td>
                        <td class="align-middle text-center">
                          <?php
                          if ($row["status"] == 1) {
                            ?>
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                              href="../includes/sdeactivate.php?id=<?php echo $row["sid"]; ?> & d=0">
                              <i class="fas fa-ban me-2"></i>Deactivate
                            </a>
                            <?php
                          } else {
                            ?>
                            <a class="btn btn-link text-success text-gradient px-3 mb-0"
                              href="../includes/sdeactivate.php?id=<?php echo $row["sid"]; ?> & d=1">
                              <i class="fas fa-thumbs-up me-2"></i>Activate
                            </a>
                            <?php
                          }
                          ?>

                          <a class="btn btn-link text-dark px-3 mb-0" type="button" data-toggle="modal"
                            data-target="#edit" onclick="getData(<?php echo $row['sid']; ?>) "><i
                              class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>

                          <a class="btn btn-link text-dark px-3 mb-0"
                            href="../includes/sdeactivate.php?id=<?php echo $row["sid"]; ?> & d=2"><i
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
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../includes/studata.php" method="POST" enctype="multipart/form-data"
          onsubmit="return formValidate()">

          <div class="modal-body py-0 my-0">
            <div id="errormsg">

            </div>

            <div class="form-group py-0 my-0">
              <label for="name">Student Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
            </div>
            <div class="form-group py-0 my-0">
              <label for="email">Student Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Student Email">
            </div>
            <div class="form-group py-0 my-0">
              <label for="classs">class</label>
              <select name="classs" id="classs" class="form-control" placeholder="Select Class">
                <option selected value="0">Select Class</option>
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
            <div class="form-group py-0 my-0">
              <label for="mobile">Mobile Number</label>
              <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group py-0 my-0">
              <label for="school">School</label>
              <input type="text" class="form-control" id="school" name="school" placeholder="Enter School Name">
            </div>
            <div class="form-group py-0 my-0">
              <label for="board">Board</label>
              <input type="text" class="form-control" id="board" name="board" placeholder="Enter Board">
            </div>
            <div class="form-group py-0 my-0">
              <label for="parent">Parent Name</label>
              <input type="text" class="form-control" id="parent" name="parent" placeholder="Enter Parent Name">
            </div>
            <div class="form-group py-0 my-0">
              <label for="pnumber">Parent Number</label>
              <input type="number" class="form-control" id="pnumber" name="pnumber" placeholder="Enter Parent Number">
            </div>
            <div class=" py-0 my-1 modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
      name = document.getElementById('name');
      email = document.getElementById('email')
      mobile = document.getElementById('mobile');
      cls = document.getElementById('classs');
      school = document.getElementById('school');
      board = document.getElementById('board');
      parent = document.getElementById('parent');
      pnumber = document.getElementById('pnumber');
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
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Mobile Number is required</span></div>"
        return false;
      }
      if (cls.value == 0) {
        cls.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Please Select Class</span></div>"
        return false;
      }
      if (school.value == "") {
        school.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>School is required</span></div>"
        return false;
      }
      if (board.value == "") {
        board.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Board is required</span></div>"
        return false;
      }
      if (parent.value == "") {
        parent.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Parent Name is required</span></div>"
        return false;
      }
      if (pnumber.value == "" && pnumber.value.length != 10) {
        pnumber.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Parent Number is required</span></div>"
        return false;
      }
    }

    function getData(id) {
      const sid = document.getElementById('sid');
      const name = document.getElementById('ename');
      const email = document.getElementById('eemail')
      const classs = document.getElementById('eclasss');
      const mobile = document.getElementById('emobile');
      const school = document.getElementById('eschool');
      const board = document.getElementById('eboard');
      const parent = document.getElementById('eparent');
      const pnumber = document.getElementById('epmobile');

      $.ajax({
        url: "../includes/getsdata.php",
        type: "GET",
        data: {
          id: id
        },
        success: function (data) {
          var parsedData = JSON.parse(data);
          if (parsedData.length > 0) {
            sid.value = parsedData[0].sid;
            name.value = parsedData[0].name;
            email.value = parsedData[0].email
            //classs.value = parsedData[0].classs;
            mobile.value = parsedData[0].mobile;
            school.value = parsedData[0].school;
            board.value = parsedData[0].board;
            parent.value = parsedData[0].pname;
            pnumber.value = parsedData[0].pmobile;
            for (var i, j = 0; i = classs.options[j]; j++) {
              if (i.value == parsedData[0].class) {
                classs.selectedIndex = j;
                break;
              }
            }

          } else {
            alert("No data found");
          }
        },
        error: function () {
          alert("Something went wrong");
        }
      });
    }

    const editValidate = () => {
      const name = document.getElementById('ename');
      const email = document.getElementById('eemail')
      const classs = document.getElementById('eclasss');
      const mobile = document.getElementById('emobile');
      const school = document.getElementById('eschool');
      const board = document.getElementById('eboard');
      const parent = document.getElementById('eparent');
      const pnumber = document.getElementById('epmobile');
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
      if (classs.value == "") {
        classs.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Class is required</span></div>"
        return false;
      }
      if (mobile.value == "" && mobile.value.length != 10) {
        mobile.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Mobile Number is required</span></div>"
        return false;
      }
      if (school.value == "") {
        school.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>School is required</span></div>"
        return false;
      }
      if (board.value == "") {
        board.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Board is required</span></div>"
        return false;
      }
      if (parent.value == "") {
        parent.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Parent Name is required</span></div>"
        return false;
      }
      if (pnumber.value == "" && pnumber.value.length != 10) {
        pnumber.focus();
        document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Parent Number is required</span></div>"
        return false;
      }
    }

  </script>
  <div class="modal fade" id="edit" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Edit Student details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="../includes/editstudata.php" method="POST" enctype="multipart/form-data"
          onsubmit="return editValidate()">

          <div class="modal-body py-0 my-0">
            <div id="errormsg2">
            </div>
            <input type="hidden" name="id" id="sid">
            <div class="form-group p-0 m-0">
              <label for="name">Student Name</label>
              <input type="text" class="form-control px-2" id="ename" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group p-0 m-0">
              <label for="eemail">Student Email</label>
              <input type="email" class="form-control px-2" id="eemail" name="email" placeholder="Enter Name">
            </div>
            <div class="form-group p-0 m-0">
              <label for="eclasss">class</label>
              <select name="eclasss" id="eclasss" class="form-control" placeholder="Select Class">
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
            <div class="form-group p-0 m-0">
              <label for="emobile">Student Mobile Number</label>
              <input type="number" class="form-control px-2" id="emobile" name="mobile"
                placeholder="Enter Mobile number">
            </div>
            <div class="form-group p-0 m-0">
              <label for="eschool">School</label>
              <input type="text" class="form-control px-2" id="eschool" name="school" placeholder="Enter School Name">
            </div>
            <div class="form-group p-0 m-0">
              <label for="eboard">Board</label>
              <input type="text" class="form-control px-2" id="eboard" name="board" placeholder="Enter Board">
            </div>
            <div class="form-group p-0 m-0">
              <label for="eparent">Parent Name</label>
              <input type="text" class="form-control px-2" id="eparent" name="parent" placeholder="Enter Parent Name">
            </div>
            <div class="form-group p-0 m-0">
              <label for="epmobile">Parent Mobile Number</label>
              <input type="number" class="form-control px-2" id="epmobile" name="pmobile"
                placeholder="Enter Parent Mobile number">
            </div>
          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center p-0 m-0">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>