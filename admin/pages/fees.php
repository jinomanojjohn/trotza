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
    <!-- <div class="min-height-150 bg-primary position-absolute w-100"></div> -->

    <?php include '../includes/sidebar.php';
    sideBar('fee');
    ?>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Fees</li>
                    </ol>
                    <h6 class="font-weight-bolder text-dark mb-0">Fees</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav  ms-md-auto pe-md-3 d-flex align-items-center">
                        <li class="nav-item d-flex align-items-center border-2">
                            <button onclick="window.location.href='profile.php'"
                                class="btn btn-outline-primary btn-md font-weight-bold  mb-0"><i
                                    class="fa fa-user me-sm-1"></i>&nbsp;&nbsp;Profile</button>
                        </li>
                        <li class="nav-item d-flex align-items-center bg-danger mx-2 rounded">
                            <button onclick="window.location.href='logout.php'"
                                class="btn btn-md font-weight-bold text-white mb-0"><i
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
                            <div
                                class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg p-3">
                                <h6 class="text-white ps-3 pt-2 text-uppercase">Fees List</h6>
                                <button class="btn bg-gradient-dark m-0 toast-btn" type="button" data-toggle="modal"
                                    data-target="#form"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New
                                    Fees</button>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-3 pb-2">
                            <div class="table-responsive p-0">
                                <table class="align-items-center mb-0 w-100 d-block d-md-table text-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                style="width: 10%;">
                                                Date</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                                style="width: 40%;">
                                                Student Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 th-sm"
                                                style="width: 20%;">
                                                Amount</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                style="width: 30%;">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT sd.name,f.date,f.amount,f.feid FROM fees f inner join student_data sd on sd.sid = f.sid";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column ">
                                                        <h6 class="mb-0 text-sm">
                                                            <?php echo $row['date'] ?>
                                                        </h6>
                                                    </div>

                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column ">
                                                        <h6 class="mb-0 text-sm">
                                                            <?php echo $row['name'] ?>
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-column ">
                                                        <h6 class="mb-0 text-sm">
                                                            ₹
                                                            <?php echo $row['amount'] ?>
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <a class="btn btn-link text-dark px-3 mb-0"
                                                        href="../includes/deleteFees.php?feid=<?php echo $row['feid'] ?>"><i
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
                <form action="../includes/fees.php" method="POST" enctype="multipart/form-data"
                    onsubmit="return formValidate()">

                    <div class="modal-body">
                        <div id="errormsg">

                        </div>

                        <div class="form-group">
                            <label for="sname">Student Name</label>
                            <!-- <input type="text" class="form-control" id="sname" list="names" name="name" placeholder="Enter Student Name" autocomplete="off"> -->
                            <select id="sname" class="form-control" name="name">
                                <option value="0">select Student</option>
                                <?php
                                $query = "select sid,name from student_data";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['sid'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Fees">
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
            let name = document.getElementById('sname');
            let amount = document.getElementById('amount');
            if (name.value == 0) {
                name.focus();
                document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Please select student</span></div>"
                return false;
            }
            if (amount.value == "" || isNaN(amount.value)) {
                amount.focus();
                document.getElementById('errormsg').innerHTML = "<div class='alert alert-danger text-white' role='alert'><span class='text-sm'>Amount is required</span></div>"
                return false;
            }

        }

    </script>
</body>

</html>