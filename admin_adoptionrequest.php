<?php include('includes/adminheader.php');
include('db/config.php'); ?>

<!--SECTION START-->
<div class="container-fluid px-4">
	<div class="row g-3 my-2">
		<div class="col-md-3">
			<div class="p-3 bg-warning shadow-sm d-flex justify-content-around align-items-center rounded">
				<div>
					<a class="btn btn-warning btn-block p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="border-radius:0%; width: 150px; height:60px;" data-bs-toggle="modal" data-bs-target="#pending"><i class="fa fa-spinner"></i> Pending </a>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="p-3 bg-secondary shadow-sm d-flex justify-content-around align-items-center rounded">
				<div>
					<a class="btn btn-secondary btn-block p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="border-radius:0%; width: 150px; height:60px;" data-bs-toggle="modal" data-bs-target="#meeting"><i class="fa fa-th"></i> For Meeting </a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="p-3 bg-success shadow-sm d-flex justify-content-around align-items-center rounded">
				<div>
					<a class="btn btn-success btn-block p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="border-radius:0%; width: 150px; height:60px;" data-bs-toggle="modal" data-bs-target="#approve"><i class="fa fa-check"></i> Approved</a>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="p-3 bg-danger shadow-sm d-flex justify-content-around align-items-center rounded">
				<div>
					<a class="btn btn-danger btn-block p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="border-radius:0%; width: 150px; height:60px;" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fa-solid fa-xmark"></i></i>Cancel</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- SECTION END -->

<!-- START ADOPTION TABLE-->
<section id="post">
	<div class="container">
		<div class="col-md-12 mt-3">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">ADOPTION REQUEST TABLE</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive mt-3">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Schedule</th>
									<th>Dog Name</th>
									<th>Agreement</th>
									<th>Message</th>
									<th>Status</th>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM adoptionrequest ORDER BY id DESC";
									$que = mysqli_query($con, $sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {

									?>


										<tr>
											<td><?php echo $cnt; ?></td>
											<td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
											<td><?php echo $result['email']; ?></td>
											<td><?php echo $result['phone']; ?></td>
											<td><?php echo $result['schedule']; ?></td>
											<td><?php echo $result['petname']; ?></td>
											<td><?php echo $result['agreement']; ?></td>
											<td><?php echo $result['message']; ?></td>
											<td>
											<?php
											if ($result['status'] == 0) {
												echo "<span class='badge bg-warning'>Pending</span>";
											} else if ($result['status'] == 1) {
												echo "<span class='badge bg-secondary'>For Meeting</span>";
											} else if ($result['status'] == 2) {
												echo "<span class='badge bg-success'>Approved</span>";
											} else {
												echo "<span class='badge bg-danger'>cancel</span>";
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
			</div>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- END OF ADOPTION REQUEST TABLE -->

<!--MODALS-->

<!-- Pending Modal -->
<div class="modal fade" id="pending">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-warning text-white">
				<div class="modal-title">
					<h5>Pending</h5>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive mt-3">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Schedule</th>
						<th>Dog Name</th>
						<th>Agreement</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM adoptionrequest WHERE status = 0";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>
							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
								<td><?php echo $result['email']; ?></td>
								<td><?php echo $result['phone']; ?></td>
								<td><?php echo $result['schedule']; ?></td>
								<td><?php echo $result['petname']; ?></td>
								<td><?php echo $result['agreement']; ?></td>
								<td>
									<?php
									if ($result['status'] == 0) {
										echo "Pending";
									?>
								</td>
								<td>

									<form action="AR_meet.php?id=<?php echo $result['id']; ?>&email=<?php echo $result['email']; ?>
									&firstname=<?php echo $result['firstname']; ?>&lastname=<?php echo $result['lastname']; ?>
									&schedule=<?php echo $result['schedule']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
										<input type="submit" class="btn btn-sm btn-secondary" name="meet" value="For Meeting">
									</form>

									<form action="AR_cancel.php?id=<?php echo $result['id']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
										<input type="submit" class="btn btn-sm btn-danger mt-3" name="cancel" value="Cancel">
									</form>


								</td>
						<?php
									} else if ($result['status'] == 1) {
										echo "Approved";
									} else {
										echo "Cancel";
									}
									$cnt++;
								}
						?>

							</tr>

					</tbody>
				</table>

			</div>

			</form>
		</div>
	</div>
</div>
<!-- End of pending Modal -->

<!-- For Meeting Modal -->
<div class="modal fade" id="meeting">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-secondary text-white">
				<div class="modal-title">
					<h5>For Meeting</h5>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive mt-3">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Schedule</th>
						<th>Dog Name</th>
						<th>Agreement</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM adoptionrequest WHERE status = 1";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>
							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
								<td><?php echo $result['email']; ?></td>
								<td><?php echo $result['phone']; ?></td>
								<td><?php echo $result['schedule']; ?></td>
								<td><?php echo $result['petname']; ?></td>
								<td><?php echo $result['agreement']; ?></td>
								<td>
									<?php
									if ($result['status'] == 1) {
										echo "For Meeting";
									?>
								</td>
								<td>

									<form action="AR_approve.php?id=<?php echo $result['id']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
										<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approve">
									</form>

									<form action="AR_cancel.php?id=<?php echo $result['id']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
										<input type="submit" class="btn btn-sm btn-danger mt-3" name="cancel" value="Cancel">
									</form>


								</td>
						<?php
									} else if ($result['status'] == 2) {
										echo "Approved";
									} else {
										echo "Cancel";
									}
									$cnt++;
								}
						?>

							</tr>

					</tbody>
				</table>

			</div>

			</form>
		</div>
	</div>
</div>
<!-- End of For Meeting Modal -->


<!-- Approve Modal-->
<div class="modal fade" id="approve">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<div class="modal-title">
					<h5>Successful Adoption</h5>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive mt-3">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Schedule</th>
						<th>Dog Name</th>
						<th>Agreement</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM adoptionrequest WHERE status = 2";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>


							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
								<td><?php echo $result['email']; ?></td>
								<td><?php echo $result['phone']; ?></td>
								<td><?php echo $result['schedule']; ?></td>
								<td><?php echo $result['petname']; ?></td>
								<td><?php echo $result['agreement']; ?></td>
								<td>
								<?php
								if ($result['status'] == 0) {
									echo "<span class='badge bg-warning'>Pending</span>";
								} else if ($result['status'] == 1) {
									echo "<span class='badge bg-success'>For Meeting</span>";
								}
								else if ($result['status'] == 2) {
									echo "<span class='badge bg-success'>Approved</span>";
								} else {
									echo "<span class='badge bg-danger'>cancel</span>";
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
</div>
<!-- End Approve modal-->

<!-- Cancel Modal-->
<div class="modal fade" id="cancel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<div class="modal-title">
					<h5>Cancel Request</h5>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive mt-3">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Schedule</th>
						<th>Dog Name</th>
						<th>Agreement</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM adoptionrequest WHERE status = 3";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>


							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
								<td><?php echo $result['email']; ?></td>
								<td><?php echo $result['phone']; ?></td>
								<td><?php echo $result['schedule']; ?></td>
								<td><?php echo $result['petname']; ?></td>
								<td><?php echo $result['agreement']; ?></td>
								<td>
								<?php
								if ($result['status'] == 0) {
									echo "<span class='badge bg-warning'>Pending</span>";
								} else if ($result['status'] == 1) {
									echo "<span class='badge bg-success'>For Meeting</span>";
								} else if ($result['status'] == 2) {
									echo "<span class='badge bg-success'>Approved</span>";
								} else {
									echo "<span class='badge bg-danger'>cancel</span>";
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
</div>
<!-- End Cancel modal-->





<?php include('includes/adminfooter.php') ?>