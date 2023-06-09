<?php
include '../admin/includes/connection.php';
// error_reporting(0);
session_start();
if (isset($_SESSION['LoginStudent'])) {
    $roll = $_SESSION['LoginStudent'];
    $flag = 0;
    $query3 = "SELECT * FROM mark_master mm INNER JOIN mark_child mc ON mm.markid = mc.markid WHERE mc.sid = $roll";
    $result3 = mysqli_query($conn, $query3);
    if (mysqli_num_rows($result3) > 0) {
        $flag = 1;
    } else {
        $flag = 0;
    }
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
                <h2>Results</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>List of Examinations</h3>
                        <?php
                        if ($flag == 0) {
                            echo '<div class="alert alert-danger" role="alert">No Examinationss or Report found!</div>';
                        } else {
                            ?>
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center">Exam Date</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Obtained Marks</th>
                                    <th class="text-center">Total Marks</th>
                                    <th class="text-center">Percentage</th>
                                </tr>
                                <?php
                                $query3 = "SELECT * FROM mark_master mm INNER JOIN mark_child mc ON mm.markid = mc.markid inner join subject sb on mm.subject=sb.subid WHERE mc.sid = $roll";
                                $result3 = mysqli_query($conn, $query3);
                                while ($row3 = mysqli_fetch_assoc($result3)) { 
                                    $percentage = ($row3['mark'] / $row3['total']) * 100;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php
                                            $date = $row3['date'];
                                            $ab = strtotime($date);
                                            echo date('D d, F, Y', $ab); ?></td>
                                        <td class="text-center"><?php echo $row3['subname']; ?></td>
                                        <td class="text-center"><?php echo $row3['mark']; ?></td>
                                        <td class="text-center"><?php echo $row3['total']; ?></td>
                                        <td class="text-center"><?php echo $percentage; ?>%</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

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