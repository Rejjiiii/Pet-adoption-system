<?php include('includes/adminheader.php') ?>

<?php
if (isset($_GET['id'])) {

    include("db/dbconnect.php");
    $petid = $_GET['id'];
    $query = $con->prepare("select *from adopted where pet_id='$petid'");

    $query->execute();
    $row = $query->fetch();
}
?>


<!-- START UPDATE ADOPTED PET -->
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
                                            <h1 class="h2 text-gray-900 mb-4">EDIT ADOPTED PET</h1>
                                        </div>
                                        <form method="post" class="user" enctype="multipart/form-data">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="petname" placeholder="Enter pet name" required autofocus value="<?php echo "" . $row['pet_name'] . ""; ?>">
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
                                                <input type="text" class="form-control mt-3" name="petcolor" placeholder="Enter pet color" required autofocus value="<?php echo "" . $row['pet_color'] . ""; ?>">
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
                                                <input type="text" class="form-control mt-3" name="breed" placeholder="Enter pet breed" required autofocus value="<?php echo "" . $row['breed'] . ""; ?>">
                                                <label for="floatingInput">Breed</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control mt-3" name="description" placeholder="Enter the description" required autofocus value="<?php echo "" . $row['description'] . ""; ?>">
                                                <label for="floatingInput">Description</label>
                                            </div>
                                            <div>
                                                <input type="file" class="form-control mt-3" name="petimg1">
                                                <img src="images/<?php echo "" . $row['pet_img1'] . ""; ?>" style="margin-top:1rem;width:80px;height:80px;">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="click" value="update details" class="w-100 btn btn-success btn-user btn-block mt-3" style="height: 3rem;">Update Adopted Pet</button>
                                            </div>
                                            <div class="form-group">
                                                <a class="w-100 btn btn-danger btn-user btn-block mt-3" style="height: 3rem;" href="admin_adopted.php">Cancel</a>
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
<!-- END UPDATE ADOPTED PET-->

<?php

if (isset($_POST['click'])) {

    $petname = $_POST['petname'];
    $petage = $_POST['petage'];
    $petcolor = $_POST['petcolor'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    $description = $_POST['description'];

    if ($_FILES['petimg1']['tmp_name'] == "") {
    } else {
        $petimage1 = $_FILES['petimg1']['name'];
        $pet_img1_temp = $_FILES['petimg1']['tmp_name'];
        move_uploaded_file($pet_img1_temp, "images/$petimage1");

        $up_img2 = $con->prepare("update adopted set pet_img1='$petimage1' where pet_id='$petid'");

        $up_img2->execute();
    }

    $query = $con->prepare("update adopted set pet_name='$petname',pet_age='$petage',pet_color='$petcolor',vaccinated='$vaccinated',breed='$breed',description='$description' where pet_id='$petid'");

    if ($query->execute()) {
        echo "<script>alert('Adopted has been updated')</script>";
        echo "<script>window.open('admin_adopted.php','_self')</script>";
    } else {
        echo "<script>alert('not update pet details')</script>";
    }
}
?>

<?php include('includes/adminfooter.php') ?>