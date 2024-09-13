<?php include('includes/adminheader.php') ?>
<style>
	img {
		width: 50px;
		height: 50px;
	}
</style>

<!-- Pet Table-->
<div class="container">
	<div class="col-md-12 mt-3">
		<main class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">ADOPTED PETS TABLE</h6>
				</div>
				<div class="card-body">
					<?php include('pagination_AR.php'); ?>
					<div class="table-responsive mt-3">
						<table class="table table-striped table-sm table-bordered">
							<thead>
								<tr>
									<th scope="col">Serial No</th>
									<th scope="col">Edit</th>
									<th scope="col">Back</th>
									<th scope="col">PetName</th>
									<th scope="col">PetAge</th>
									<th scope="col">PetColor</th>
									<th scope="col">Vaccinated</th>
									<th scope="col">Breed</th>
									<th scope="col">Description</th>
									<th scope="col">PetImage</th>
								</tr>
							</thead>

							<?php
							include("db/dbconnect.php");
							$i=1;
							foreach ($result as $data) {

								echo
								"<tr>
								<td>".$i++."</td>
								<td><a class= 'btn btn-warning' href='adoptedpet_edit.php?id=" . $data['pet_id'] . "'>Edit</td>	
								<td><a class= 'btn btn-secondary' href='adoptedpet_back.php?id=" . $data['pet_id'] . "'>Back</td>

								<td>" . $data['pet_name'] . "</td>
								<td>" . $data['pet_age'] . "</td>
								<td>" . $data['pet_color'] . "</td>
								<td>" . $data['vaccinated'] . "</td>
								<td>" . $data['breed'] . "</td>
								<td>" . $data['description'] . "</td>
								<td><img src='images/" . $data['pet_img1'] . "'></td>
								</tr>";
							}
							?>

						</table>

						<ul class="pagination">
							<?php
							if ($page_counter == 0) {
								echo "<li class='page-item'><a  href=?start='0'></a></li>";
								for ($j = 1; $j < $paginations; $j++) {
									echo "<li class='page-item'><a class='page-link' href=?start=$j>" . $j . "</a></li>";
								}
							} else {
								echo "<li class='page-item' ><a class='page-link' href=?start=$previous>Previous</a></li>";
								for ($j = 0; $j < $paginations; $j++) {
									if ($j == $page_counter) {
										echo "<li class='page-item' ><a class='page-link' href=?start=$j class='active'>" . $j . "</a></li>";
									} else {
										echo "<li class='page-item' ><a class='page-link' href=?start=$j>" . $j . "</a></li>";
									}
								}
								if ($j != $page_counter + 1)
									echo "<li class='page-item'><a class='page-link' href=?start=$next>Next</a></li>";
							}
							?>
						</ul>
						
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
<!-- End of Pet Table -->
<?php include('includes/adminfooter.php') ?>