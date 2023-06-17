<?php
include '../admin/includes/connection.php';
// error_reporting(0);
session_start();
if (isset($_SESSION['LoginStudent'])) {
    // Check if a month is selected
    $selected = "";
    if (isset($_GET['month'])) {
        $selected = $_GET['month'];
    } else {
        $selected = date('Y-m');
    }
    $attpresent = 0;
    $atttotal = 0;
    $attpercent = 0;
    $atdate = "";
    $status = 0;

    $query1 = "SELECT COUNT(*) FROM attendance_master WHERE adate LIKE '%$selected%'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    $attpresent = $row1[0];

    $query2 = "SELECT COUNT(*) FROM attendance_child ac INNER JOIN attendance_master am ON ac.mid = am.aid WHERE am.adate LIKE '%$selected%' AND ac.status = '1' AND ac.sid = '" . $_SESSION['LoginStudent'] . "'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);
    $atttotal = $row2[0];

    if ($atttotal > 0) {
        $attpercent = ($attpresent / $atttotal) * 100;
    }


    $ad = "SELECT adate FROM attendance_master WHERE adate LIKE '%$selected%' LIMIT 1";
    $pr = "SELECT ac.status FROM attendance_child ac INNER JOIN attendance_master am ON ac.mid = am.aid WHERE am.adate LIKE '%$selected%' AND ac.sid = {$_SESSION['LoginStudent']} LIMIT 1";
    $adate = mysqli_query($conn, $ad);
    $flag = 0;
    if (mysqli_num_rows($adate) > 0) {
        $flag = 1;
        $date = mysqli_fetch_array($adate);
        $atdate = $date['adate'];
    } else {
        $flag = 0;
    }
    $present = mysqli_query($conn, $pr);
    if (mysqli_num_rows($present) > 0) {
        $status = mysqli_fetch_array($present);
        $atstatus = $status[0];
        if ($atstatus == 1) {
            $atstatus = "Present";
        } else {
            $atstatus = "Absent";
        }
    }
    $query3 = "SELECT * FROM attendance_master WHERE adate LIKE '%$selected%'";
    $result3 = mysqli_query($conn, $query3);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>TROTZA</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">

    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">

                <h1 class="logo me-auto"><a href="../index.php">TROTZA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a> -->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a class="active" href="../student/attendance.php">Attendance</a></li>
                        <li><a href="../student/marks.php">Marks</a></li>
                    </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

                <a href="../logout.php" class="get-started-btn">Logout</a>

            </div>
        </header><!-- End Header -->

        <?php
} else {
    echo "<script>window.location.href='index.php';</script>";
}
?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <h2>Attendance</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Select a month to view attendance:</h3>
                        <form action="" method="GET">
                            <div class="mb-3">
                                <label for="month">Attendance</label>
                                <input type="month" id="month" name="month" value="<?php echo $selected ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">View Monthly Attendance</button>
                        </form>
                    </div>
                </div>
                <?php
                if ($flag == 0 && isset($_GET['month'])) {
                    echo '<br>';
                    echo '<div class="alert alert-danger" role="alert">No attendance found for this month!</div>';
                }
                ?>
                <?php
                if (mysqli_num_rows($adate) > 0) {
                    echo '<div class="row mt-4">';
                    echo '<div class="col-lg-8">';
                    echo '<h4>Attendance Summary for ' . $selected . '</h4>';
                    echo '<table class="table table-striped">';
                    echo '<tr>';
                    echo '<th>Total Working Days</th>';
                    echo '<td>' . $atttotal . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Total Present Days</th>';
                    echo '<td>' . $attpresent . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Percentage</th>';
                    echo '<td>' . $attpercent . '%</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AttModal">
                        View Daily Attendance
                    </button>
                    <?php
                }
                ?>
            </div>
        </section>


    </main><!-- End #main -->
    <!-- Modal -->
    <div class="modal fade" id="AttModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daily Attendance for
                        <?php
                        $ab = strtotime($selected);
                        echo date('F, Y', $ab); ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Date</th>
                            <th>Attendance</th>
                        </tr>
                        <?php
                        while ($row3 = mysqli_fetch_array($result3)) {
                            echo '<tr>';
                            echo '<td>' . $atdate . '</td>';
                            echo '<td>' . $atstatus . '</td>';
                            echo '</tr>';
                            // echo '<script>alert("' . $atdate . '")</script>';
                            // echo '<script>alert("' . $atstatus . '")</script>';
                        }
                        ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>