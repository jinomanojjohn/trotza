<?php 
include '../admin/includes/connection.php';
$roll = $_POST['roll'];
$date = $_POST['date'];
$percentage = $_POST['percentage'];
$obtained = $_POST['obtained'];
$total = $_POST['total'];
?>

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Report Card of
                        <?php
                        $ab = strtotime($date);
                        echo date('D d, F, Y', $ab); ?> Exam
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-2">
                    <h5>Student Name:&nbsp;<strong>
                            <?php
                            $query5 = "SELECT * FROM student_data WHERE sid = '$roll'";
                            $result5 = mysqli_query($conn, $query5);
                            $row5 = mysqli_fetch_assoc($result5);
                            echo $row5['name'];
                            ?>
                        </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class:&nbsp;<strong>
                            <?php
                            $query5 = "SELECT * FROM student_data sd INNER JOIN class ON sd.class = class.cid WHERE sid = '$roll'";
                            $result5 = mysqli_query($conn, $query5);
                            $row5 = mysqli_fetch_assoc($result5);
                            echo $row5['clname'];
                            ?>
                        </strong></h5>
                    <table class="table table-striped mt-4">
                        <tr>
                            <th>Subject</th>
                            <th>Marks Obtained</th>
                            <th>Out Of</th>
                        </tr>
                        <?php
                        $query4 = "SELECT * FROM mark_master mm INNER JOIN mark_child mc ON mm.markid = mc.markid INNER JOIN mark_subchild ms ON mc.mcid = ms.mcid INNER JOIN subject sb ON ms.subject = sb.subid WHERE mc.sid = '$roll' and mm.date = '$date'";
                        $result4 = mysqli_query($conn, $query4);
                        while ($row1 = mysqli_fetch_assoc($result4)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row1['subname'] ?>
                                </td>
                                <td>
                                    <?php echo $row1['mark'] ?>
                                </td>
                                <td>
                                    <?php echo $row1['tmark'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <th>Total:</th>
                            <th>
                                <?php echo $obtained ?>
                            </th>
                            <th>
                                <?php echo $total ?>
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <th>Percentage:</th>
                            <th>
                                <?php echo $percentage ?>%
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary d-none d-sm-block" onclick="printModal()">Print</button>
                </div>
            </div>