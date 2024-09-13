<?php include('includes/userheader.php');
?>

<?php
if (isset($_POST['apply'])) {
	include("db/dbconnect.php");

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$schedule = $_POST['schedule'];
	$petname = $_POST['petname'];
	$agreement = $_POST['agreement'];
	$status = $_POST['status'];
	$message = "$lastname $firstname would like to request for adoption.";

	$query = $con->prepare("insert into adoptionrequest(firstname,lastname,email,phone,schedule,petname,agreement,message,status)values('$firstname','$lastname','$email','$phone','$schedule','$petname','$agreement','$message','$status')");

	if ($query->execute()) {
		echo "<script>alert('Your adoption request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
		echo "<script>window.open('user_adoption.php','_self')</script>";;
	} else {
		echo "<script>alert('Please try again later')</script>";
	}
}
?>

<!-- START MODAL -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" ">
	<div class="modal-dialog modal-lg">
	<div class="modal-content d-inline-flex p-2">

		<div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel" style="font-size: 3rem;">Adoption Form</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 3rem;">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<form method="post" class="user" enctype="multipart/form-data">
			<div class="form-floating mb-3 mt-4">
				<input type="text" class="form-control" name="firstname" placeholder="Enter firstname" style="font-size: 1.75rem;" required autofocus>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" name="lastname" placeholder="Enter lastname" style="font-size: 1.75rem;" required autofocus>
			</div>
			<input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
			<div class="form-floating mb-4">
				<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" style="font-size: 1.75rem;" required autofocus>
			</div>
			<div class="form-floating mb-4">
				<label for="floatingInput" style="font-size: 1.75rem;">Share your availability for a 1-hour interview with certainly considered one among our volunteers</label>
				<input type="text" class="form-control mt-1" name="schedule" placeholder="*e.g. format:  Feb 22 at 3pm-4pm" style="font-size: 1.75rem;" required autofocus>
			</div>
			<div class="form-floating mb-4">
				<label for="floatingInput" style="font-size: 1.75rem;">Name of rescue you would like to adopt. If you are not considering a specific rescue and/or want to decide when to visit the shelter, please write "N/A".</label>
				<input type="text" class="form-control" name="petname" placeholder="Enter dog name" style="font-size: 1.75rem;" required autofocus>
			</div>
			<div class="form-floating mb-4">
				<label for="floatingInput" style="font-size: 1.75rem;">Would you like to choose another save if the above save is no longer available?</label>
				<select name="agreement" class="form-control mt-3" style="width:470px; font-size: 1.75rem;" required autofocus>
					<option selected>Choose...</option>
					<option>Yes, I will undertake another rescue instead.</option>
					<option>No, I will withdraw my application if the rescue selected above is no longer accepted.</option>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" name="status" value="0">
				<button type="submit" name="apply" class="w-100 btn btn-success btn-user btn-block mt-3" style="height: 5rem; font-size: 1.75rem;">Add Pet Details</button>
				<button type="button" class="w-100 btn btn-warning btn-user btn-block mt-3" data-dismiss="modal" style="height: 5rem; font-size: 1.75rem;">Cancel</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<!-- END MODAL -->


<!-- START PET CARDS-->
<div class="container" id="pet-card">
	<div class="row" style="margin-top: 90px;">
		<?php
		include('db/functions.php');

		$query = "SELECT * FROM petdetails";

		if (count(fetchAll($query)) > 0) {
			foreach (fetchAll($query) as $row) {
		?>



				<div class="container col-md-4 py-3 py-md-2">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<img class="card card-img-top border-0 p-4" style="height: 30rem;" src="images/<?php echo $row['pet_img1']; ?>">
							<div class="card-body p-4">
								<h2 class="card-tittle">Name: <?php echo $row['pet_name']; ?></h2>
								<p class="card-text">Age: <?php echo $row['pet_age']; ?></p>
								<p class="card-text">Color: <?php echo $row['pet_color']; ?></p>
								<p class="card-text">Vaccinated: <?php echo $row['vaccinated']; ?></p>
								<p class="card-text">Breed: <?php echo $row['breed']; ?></p>
								<p class="card-text">Information: <?php echo $row['description']; ?></p>
								
								<!-- Button trigger modal -->
								<div class="text-center">
									<button type="button" class="btn btn-success text-center" data-toggle="modal" data-target="#staticBackdrop" style="font-size: 1.50rem;">
										Adopt
									</button>
								</div>

							</div>
						</div>

					</div>
				</div>

		<?php
			}
		} else {
			echo "No Posted Pets.";
		}
		?>

	</div>
</div>
<!--END PET CARDS-->







<?php include('includes/userfooter.php') ?>