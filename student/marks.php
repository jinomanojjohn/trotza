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
                                    <th>Exam Date</th>
                                    <th>Subject</th>
                                    <th>Obtained Marks</th>
                                    <th>Total Marks</th>
                                    <th>Percentage</th>
                                    <th></th>
                                </tr>
                                <?php
                                $query3 = "SELECT * FROM mark_master mm INNER JOIN mark_child mc ON mm.markid = mc.markid WHERE mc.sid = $roll";
                                $result3 = mysqli_query($conn, $query3);
                                while ($row8 = mysqli_fetch_assoc($result3)) {
                                    $obtained = 0;
                                    $total = 0;
                                    $percentage = 0;
                                    $query4 = "SELECT * FROM mark_subchild WHERE mcid = {$row8['mcid']}";
                                    $result4 = mysqli_query($conn, $query4);
                                    while ($row9 = mysqli_fetch_assoc($result4)) {
                                        $mark1 = $row9['mark'];
                                        $obtained += $mark1;

                                        $mark2 = $row9['tmark'];
                                        $total += $mark2;

                                    }
                                    $date = $row8['date'];
                                    if ($total != 0) {
                                        $per = ($obtained / $total) * 100;
                                        $percentage = number_format($per, 2);
                                    }
                                    ?>

                                    <tr>
                                        <td>
                                            <?php
                                            $ab = strtotime($date);
                                            echo date('D d, F, Y', $ab); ?>
                                        </td>
                                        <td>
                                            <?php echo $obtained; ?>
                                        </td>
                                        <td>
                                            <?php echo $total; ?>
                                        </td>
                                        <td>
                                            <?php echo $percentage; ?>%
                                        </td>
                                        <td><button
                                                onclick="getMark('<?php echo $date; ?>',<?php echo $roll; ?>,<?php echo $percentage; ?>,<?php echo $obtained; ?>,<?php echo $total; ?>)"
                                                type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#AttModal">
                                                View Report Card
                                            </button></td>
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
    <!-- Modal -->
    <div class="modal fade" id="AttModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="innerData">

        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <!-- Modal scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js">
    </script>

    <script>
        function printModal() {
            var printContents = document.getElementById("AttModal").innerHTML;
            var originalContents = document.body.innerHTML;

            // Remove the print button from the modal content
            var tempContainer = document.createElement("div");
            tempContainer.innerHTML = printContents;
            var printButton = tempContainer.querySelector(".btn-primary");
            if (printButton) {
                printButton.parentNode.removeChild(printButton);
            }
            printContents = tempContainer.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
            setTimeout(function () {
                location.reload();
            });
        }
    </script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script>
        function getMark(date, roll, percentage, obtained, total) {
            $.ajax({
                url: "getMark.php",
                type: "POST",
                data: {
                    date: date,
                    roll: roll,
                    percentage: percentage,
                    obtained: obtained,
                    total: total
                },
                success: function (data) {
                    document.getElementById("innerData").innerHTML = data;
                }
            });
        }
    </script>

</body>

</html>