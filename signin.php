<?php session_start();
include('db/functions.php'); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--- Bootstrap css link --->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- CUSTOM CSS-->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="text-center">

  
  

  <?php
  include('db/config.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "select * from accounts where email='" . $email . "' AND password='" . $password . "' ";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) >0){
      
      if ($row["type"] == "user") {

        $_SESSION["email"] = $email;
  
        header("location:user_adoption.php");
      
      } elseif ($row["type"] == "admin") {
  
        $_SESSION["email"] = $email;
  
        header("location:admin_details.php");

    }
    
    } else {
      echo "<script>alert('email or password incorrect')</script>";
    }
  }
  ?>

  <!-- START LOGIN FORM  -->
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-signin-image">
              </div>
              <div class="col-lg-6">
                <div class="p-5">

                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                  <form method="POST" class="user">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" id="InputEmail" placeholder="Email address" required autofocus>
                    </div>

                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user mt-2" id="InputPassword" placeholder="Password" required>
                    </div>

                    <div>
                      <button name="signin" class="w-100 btn btn-primary btn-user mt-2" type="submit">Sign in</button>
                    </div>

                    <hr>

                    <div>
                      <a href="signup.php" class="mt-5 small">Create an account</a>
                    </div>
                    
                    <div>
                      <a href="index.php" class="mt-5 small">Go Back</a>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- END LOGIN FORM  -->

  <!--- Bootstrap css link --->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>