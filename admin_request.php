<?php include('includes/adminheader.php') ?>

<!--- Request Section -->

<div style="margin-top:20px;">
    <main class="col-md-12" role="main">

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">REQUESTED ACCOUNT</h6>
                </div>
                <?php
                include('db/functions.php');
                $query = "select * from `requests`;";
                if (count(fetchAll($query)) > 0) {
                    foreach (fetchAll($query) as $row) {
                ?>

                        <div class="container text-center">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <h1 class="jumbotron-heading mt-3"><?php echo $row['email'] ?></h1>
                                    <p class="lead text-muted"><?php echo $row['message'] ?></p>
                                    <img class="card-center" style="width: 20rem;" src="images/<?php echo $row['identification']; ?>">

                                    <p>
                                        <a href="request_accept.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-3">Accept</a>
                                        <a href="request_reject.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-3">Reject</a>
                                    </p>
                                    <small><i class="btn mb-3"><?php echo $row['date'] ?></i></small>
                                </div>

                            </div>
                        </div>



                <?php
                    }
                } else {
                    echo "No Pending Requests.";
                }
                ?>

                



            </div>

        </div>


    </main>
</div>





<?php include('includes/adminfooter.php') ?>