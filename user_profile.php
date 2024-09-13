<?php include('includes/userheader.php');
include('db/config.php');
?>


<!-- START TABLE REQUEST -->
<section id="post">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover table-striped"  style="margin-top: 20px;">
                    <thead style="font-size: 2rem;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Schedule</th>
                        <th>Dog Name</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM adoptionrequest WHERE email='" . $_SESSION['email'] . "'";
                        $que = mysqli_query($con, $sql);
                        $cnt = 1;
                        while ($result = mysqli_fetch_assoc($que)) {
                        ?>


                            <tr class="text-center">
                                <td style="font-size: 1.50rem;"><?php echo $cnt; ?></td>
                                <td style="font-size: 1.50rem;"><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?> </td>
                                <td style="font-size: 1.50rem;"><?php echo $result['email']; ?></td>
                                <td style="font-size: 1.50rem;"><?php echo $result['phone']; ?></td>
                                <td style="font-size: 1.50rem;"><?php echo $result['schedule']; ?></td>
                                <td style="font-size: 1.50rem;"><?php echo $result['petname']; ?></td>
                                <td>
                                <?php
                                if ($result['status'] == 0) {
                                    echo "<span class='badge bg-warning' style='font-size: 1.20rem;'>Pending</span>";
                                } else if ($result['status'] == 1) {
                                    echo "<span class='badge bg-secondary' style='font-size: 1.20rem;'>For Meeting</span>";
                                } else if ($result['status'] == 2) {
                                    echo "<span class='badge bg-success' style='font-size: 1.20rem;'>Approved</span>";
                                } else {
                                    echo "<span class='badge bg-danger' style='font-size: 1.20rem;'>cancel</span>";
                                }
                                $cnt++;
                            }
                                ?>
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<?php include('includes/userfooter.php') ?>