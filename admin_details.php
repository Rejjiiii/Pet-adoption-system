<?php include('includes/adminheader.php');
include('db/config.php'); ?>

<div class="container-fluid px-4">
  <div class="row g-3 my-2">
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="info-box-number"><?php echo $con->query("SELECT * FROM petdetails")->num_rows; ?></h3>
          <p class="fs-5">Total Dogs</p>
        </div>
        <i class="fa-solid fa-dog fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>

    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="info-box-number"><?php echo $con->query("SELECT * FROM adopted")->num_rows; ?></h3>
          <p class="fs-5">Adopted Dogs</p>
        </div>
        <i class="fa-sharp fa-solid fa-hand-holding-heart fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>

    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="info-box-number"><?php echo $con->query("SELECT * FROM accounts")->num_rows; ?></h3>
          <p class="fs-5">Accounts</p>
        </div>
        <i class="fa-solid fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
  </div>

  <style>
    img {
      width: 50px;
      height: 50px;
    }
  </style>

  

  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <main class="col-md-12">

        <!-- Pet Table-->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Available Dogs</h6>
          </div>
          <div class="card-body">
          <?php include('pagination_petdetails.php'); ?>
            <div class="table-responsive mt-3">
              <table class="table table-striped table-sm table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Pet Name</th>
                    <th scope="col">Pet Age</th>
                    <th scope="col">Pet Color</th>
                    <th scope="col">Vaccinated</th>
                    <th scope="col">Breed</th>
                    <th scope="col">Description</th>
                    <th scope="col">Pet Image</th>
                  </tr>
                </thead>

                <?php
                include("db/dbconnect.php");
                $i=1;
                    foreach($result as $data) { 
                        echo '<tr>';
                        echo '<td>'.$i++.'</td>';
                        echo '<td>'.$data['pet_name'].'</td>';
                        echo '<td>'.$data['pet_age'].'</td>';
                        echo '<td>'.$data['pet_color'].'</td>';
                        echo '<td>'.$data['vaccinated'].'</td>';
                        echo '<td>'.$data['breed'].'</td>';
                        echo '<td>'.$data['description'].'</td>';
                        echo '<td><img src=images/'.$data['pet_img1'].'></td>';
                        echo '</tr>';
                    }
                 ?>

                

              </table>
              <nav aria-label="Page navigation example">
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
              </nav>
            </div>
          </div>
        </div>
        <!-- End of Pet Table -->

      </main>
    </div>
  </div>


  <?php include('includes/adminfooter.php') ?>