<?php include('includes/adminheader.php') ?>

<!-- START ADD PET -->
<div class="container-fluid">
    <div class="col-md-12 mt-3">
        <main class="col-md-12">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-4">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h2 text-gray-900 mb-4">INPUT PET DETAILS</h1>
                                        </div>
                                        <form method="post" class="user" enctype="multipart/form-data">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="petname" placeholder="Enter pet name" required autofocus>
                                                <label for="floatingInput">Enter Pet Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <select name="petage" class="form-select mt-3" required autofocus>
                                                    <option selected>...</option>
                                                    <option>Puppy</option>
                                                    <option>Adult</option>
                                                    <option>Senior</option>
                                                </select>
                                                <label for="floatingInput">Enter Pet Age</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control mt-3" name="petcolor" placeholder="Enter pet color" required autofocus>
                                                <label for="floatingInput">Enter Pet Color</label>
                                            </div>
                                            <div class="form-floating">
                                                <select name="vaccinated" class="form-select mt-3" required autofocus>
                                                    <option selected>...</option>
                                                    <option>YES</option>
                                                    <option>NO</option>
                                                </select>
                                                <label for="floatingInput">Vaccinated</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control mt-3" name="breed" placeholder="Enter pet breed" required autofocus>
                                                <label for="floatingInput">Breed</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control mt-3" name="description" placeholder="Enter the description" required autofocus>
                                                <label for="floatingInput">Description</label>
                                            </div>
                                            <div>
                                                <input type="file" class="form-control mt-3" name="petimg1" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="apply" class="w-100 btn btn-success btn-user btn-block mt-3" style="height: 3rem;">Add Pet Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>    
    </div>    
</div>
<!-- END ADD PET -->

<?php
if (isset($_POST['apply'])) {
    include("db/dbconnect.php");

    $petname = $_POST['petname'];
    $petage = $_POST['petage'];
    $petcolor = $_POST['petcolor'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    $description = $_POST['description'];;
    $petimage1 = $_FILES['petimg1']['name'];
    $pet_img1_temp = $_FILES['petimg1']['tmp_name'];

    move_uploaded_file($pet_img1_temp, "images/$petimage1");

    $query = $con->prepare("insert into petdetails(pet_name,pet_age,pet_color,vaccinated,breed,description,pet_img1)values('$petname','$petage','$petcolor','$vaccinated','$breed','$description','$petimage1')");

    if ($query->execute()) {
        echo "<script>alert('stored pet details')</script>";
    } else {
        echo "<script>alert('not stored pet details')</script>";
    }
}
?>


<?php include('includes/adminfooter.php') ?>