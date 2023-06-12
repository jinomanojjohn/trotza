<?php
include '../admin/includes/connection.php';
// error_reporting(0);
session_start();
if (isset($_SESSION['LoginStudent'])) {
    
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
                        <li><a href="../student/attendance.php">Attendance</a></li>
                        <li><a class="active" href="../student/marks.php">Marks</a></li>

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
                <h2>Results</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>List of Examinations</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Exam</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Obtained Marks</th>
                                <th>Total Marks</th>
                                <th>Percentage</th>
                            </tr>
                            <?php
                            $roll = $_SESSION['LoginStudent'];
                            $sql = "SELECT * FROM mark_child mc inner join mark_master mm on mc.markid=mm.markid WHERE mm.sid='$roll'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $exam = $row['exam'];
                                $subject = $row['subject'];
                                $class = $row['class'];
                                $obtained = $row['obtained'];
                                $total = $row['total'];
                                $percentage = $row['percentage'];
                                echo '<tr>';
                                echo '<td>'.$exam.'</td>';
                                echo '<td>'.$subject.'</td>';
                                echo '<td>'.$class.'</td>';
                                echo '<td>'.$obtained.'</td>';
                                echo '<td>'.$total.'</td>';
                                echo '<td>'.$percentage.'</td>';
                                echo '</tr>';
                            }
                            ?>
                    </div>
                </div>
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
                        $ab=strtotime($selected);
                        echo date('F, Y',$ab); ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo '<table class="table table-striped">';
                    echo '<tr>';
                    echo '<th>Date</th>';
                    echo '<th>Attendance</th>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>'.$atdate.'</td>';
                    echo '<td>'.$atstatus.'</td>';
                    echo '</table>';
                    // echo '<script>console.log("'.$adate.'");</script>';
                    // echo '<script>console.log("'.$present.'");</script>';
                    ?>
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