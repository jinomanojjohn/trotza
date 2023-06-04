<?php
include '../includes/connection.php';
session_start();
// Start a new session
// Check if the user is already logged in
// if (!isset($_SESSION['admin_loggedin'])) {
//     header("location: ../admin/"); // Redirect to dashboard if already logged in
//     exit;
// }
if (!isset($_REQUEST['dt']) && !isset($_REQUEST['class']) && !isset($_REQUEST['aid'])) {
    header("location: attendance_list.php");
}
$mid = $_REQUEST['aid'];
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
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
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid">
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
            <form action="../includes/attendance.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header p-0 position-relative mt-n4">
                                <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg p-3">
                                    <h6 class="text-white ps-3 pt-2 text-uppercase">View Attendance</h6>
                                    <h6 class="text-white ps-3 pt-2 text-uppercase"><?php echo $date?></h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-3 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="align-items-center w-100 d-block d-md-table text-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 nowrap " style="width: 15%;">
                                                    Roll No</th>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 nowrap " style="width: 15%;">
                                                    Student Name</th>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 th-sm nowrap " style="width: 15%;">
                                                    Present</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" value="<?php echo $date?>" name="dt">
                                            <input type="hidden" value="<?php echo $class?>" name="class">
                                            <?php
                                            $query = "SELECT ac.acid,ac.status,sd.name,sd.sid from attendance_child ac inner join student_data sd on sd.sid=ac.sid where mid=$mid";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <div class="d-flex flex-column ">
                                                            <h6 class="mb-0 text-sm">
                                                                <?php echo $row["sid"]; ?>
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center nowrap font-weight-bolder mb-0 ">
                                                        <?php echo $row["name"]; ?>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <p class="<?php if($row['status'] == 1) echo "text-success"; else echo "text-danger";?> font-weight-bolder">
                                                            <?php if($row['status'] == 1) echo 'Present'; else echo 'Absent'; ?>
                                                        <p>
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
            </form>
        </div>
    </main>




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
        // document.getElementById('atdate').value = Date();

        function getData(id) {
            const name = document.getElementById('ename');
            const email = document.getElementById('eemail');
            const mobile = document.getElementById('emobile');
            const fid = document.getElementById('fid');
            // const pass = document.getElementById('epass');

            $.ajax({
                url: "../includes/getfdata.php",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    if (parsedData.length > 0) {
                        fid.value = parsedData[0].fid;
                        name.value = parsedData[0].name;
                        email.value = parsedData[0].email;
                        mobile.value = parsedData[0].mobile;
                        // pass.value = parsedData[0].password;
                        console.log(parsedData);
                    } else {
                        console.log("No data found for the specified ID.");
                    }
                },
                error: function() {
                    console.log("Error occurred during the AJAX request.");
                }
            });
        }
    </script>
</body>

</html>