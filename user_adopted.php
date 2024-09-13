<?php include('includes/userheader.php')?>



	<!--PET CARDS-->
	<div class="container" id="pet-card">
		<div class="row" style="margin-top: 100px;">
			<?php
			include('db/functions.php');
			
			$query = "SELECT * FROM adopted";

			if (count(fetchAll($query)) > 0)
			{
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

								
							</div>
						</div>

					</div>
				</div>

			<?php
			}
			}else {
				echo "No Posted Pets.";
			}
			?>

		</div>		
	</div>
	<!--PET CARDS END-->




<?php include('includes/userfooter.php')?>