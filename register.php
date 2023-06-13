<?php
include('admin/includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Register Page
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
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div id="bgpic"
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('admin/assets/img/login_bg.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"An Investment In Knowledge <br> Pays
                  The Best Interest"</h4>
                <p class="text-white position-relative">Benjamin Franklin</p>
              </div>
            </div>
            <div
              class="col-xl-6 col-lg-6 col-md-12 d-flex h-100 my-auto p-6 position-absolute top-0 end-0 justify-content-center flex-column">
              <div class="card card-plain">
                <div class="card-header pb-0 mt-3 mb-0 text-start">
                <button onclick="window.location.href='index.php'"
                class="btn bg-gradient-primary font-weight-bold text-white mb-0"><i
                    class="fa fa-arrow-left me-sm-1"></i>&nbsp;&nbsp;Home</button>
                  <h4 class="font-weight-bolder">New Student Registeration</h4>
                  <p class="mb-0">Create your account</p>
                  <p>Already have an account? <a href="login.php" class="font-weight-bold">Log In</a></p>
                </div>
                <div class="card-body">
                  <form action="admin/includes/studata.php" method="POST" enctype="multipart/form-data"
                    onsubmit="return formValidate()">

                    <div class="modal-body my-0 py-0">
                      <div id="errormsg">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="name" class="mt-0 mb-0 pt-0">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="email" class="mt-0 mb-0 pt-0">Student Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                          placeholder="Enter Student Email">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="classs" class="mt-0 mb-0">Class</label>
                        <select name="classs" id="classs" class="form-control mt-0 mb-0" placeholder="Select Class">
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
                      <div class="form-group my-0 py-0">
                        <label for="mobile" class="mt-0 mb-0">Mobile Number</label>
                        <input type="number" class="form-control" id="mobile" name="mobile"
                          placeholder="Enter Mobile Number">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="school" class="mt-3 mb-0">School</label>
                        <input type="text" class="form-control" id="school" name="school"
                          placeholder="Enter School Name">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="board" class="mt-3 mb-0">Board</label>
                        <input type="text" class="form-control" id="board" name="board" placeholder="Enter Board">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="parent" class="mt-3 mb-0">Parent Name</label>
                        <input type="text" class="form-control" id="parent" name="parent"
                          placeholder="Enter Parent Name">
                      </div>
                      <div class="form-group my-0 py-0">
                        <label for="pnumber" class="mt-3 mb-0">Parent Number</label>
                        <input type="number" class="form-control" id="pnumber" name="pnumber"
                          placeholder="Enter Parent Number">
                      </div>
                      <div class=" mb-0 py-0 modal-footer border-top-0 d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
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

  <script>
    const formValidate = () => {
      name = document.getElementById('name');
      email =document.getElementById('email');
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
      if (email.value == ""){
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

  </script>

</body>

</html>