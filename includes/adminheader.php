<?php
session_start();


if(!isset($_SESSION["email"]))
{
	  header("location:signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- FONT AWESOME LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CUSTOM CSS FILE LINK -->
    <link rel="stylesheet" href="css/adminstyle.css" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
              <i class="fa-solid fa-paw"></i> PETADOPTION</div>
            <div class="list-group list-group-flush my-3">
                <a href="admin_details.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-sharp fa-solid fa-shield-dog me-2"></i>Dog Details</a>

                <a href="admin_adoption.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-solid fa-dog me-2"></i>Adoption</a>

                <a href="admin_adopted.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-solid fa-hand-holding-heart me-2"></i>Adopted Dog</a>

                <a href="admin_addpet.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-sharp fa-solid fa-cart-plus me-2"></i>Add Dog</a>

                <a href="admin_adoptionrequest.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-solid fa-rectangle-list me-2"></i>Adoption Request</a>

                <a href="admin_request.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-solid fa-users me-2"></i>Request Accounts</a>

                <a href="session_logout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Admin Dashboard</h2>
                </div>
            </nav>
        
        