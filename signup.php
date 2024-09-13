<?php
session_start(); //we need session for the log in thingy XD 
include('db/functions.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Bootstrap CSS link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
  <!-- CUSTOM CSS-->
  <link rel="stylesheet" href="css/styles.css">

</head>

<?php
if (isset($_POST['signup'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $identification = $_POST['identification'];

  if ($_FILES['identification']['tmp_name'] == "") {
  } else {
    $identification = $_FILES['identification']['name'];
    $pet_img1_temp = $_FILES['identification']['tmp_name'];
    move_uploaded_file($pet_img1_temp, "images/$identification");
  }

  $message = "$lastname $firstname would like to request an account.";
  $query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `identification`, `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$identification', '$message', CURRENT_TIMESTAMP)";


  if (performQuery($query)) {
    echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
    echo "<script>window.open('signin.php','_self')</script>";;
  } else {
    echo "<script>alert('Unknown error occured.')</script>";
  }
}
?>

<body>
  <!-- START SIGNUP FORM -->
    <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-signup-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>

                <form method="post" class="user" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-sm-0">
                      <input name="firstname" type="text" id="inputFirstname" class="form-control form-control-user mt-2" placeholder="Firstname" required autofocus>
                    </div>
                    <div class="col-sm-6">
                      <input name="lastname" type="text" id="inputLastname" class="form-control form-control-user mt-2" placeholder="Lastname" required autofocus>
                    </div>
                  </div>

                  <div class="form-group">
                    <input name="email" type="email" id="inputEmail" class="form-control form-control-user mt-2" placeholder="Email address" required autofocus>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-sm-0">
                      <input name="password" type="password" id="inputPassword" class="form-control form-control-user mt-2" placeholder="Password" required>
                    </div>
                    <div class="col-sm-6">
                      <input name="identification" class="form-control form-control-user mt-2" id="formFileSm" type="file" required>
                    </div>
                  </div>

                  <div class="mt-4">
                    <button name="signup" class="w-100 btn btn-primary btn-user mt-2" type="submit">Sign up</button>
                  </div>

                  <hr>

                  <div class="text-center">
                    <a href="signin.php" class="mt-5 mb-3 small">Already have an account? Login!</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  <!-- END SIGNUP FORM-->



  <!-- Bootstrap CSS link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>