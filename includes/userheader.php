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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userstyle.css">\

    <title>USER PAGE</title>

</head>

<body>

    <!-- header section starts  -->

    <header class="header fixed-top">

        <div class="container">

            <div class="row align-items-center justify-content-between">

                <a href="" class="logo">Pet<span>Adoption</span></a>

                <nav class="nav">
                    <a href="user_profile.php">Profile</a>
                    <a href="user_adoption.php">adoption</a>
                    <a href="user_adopted.php">adopted</a>
                    <a href="session_logout.php">Logout</a>

                </nav>



                <div id="menu-btn" class="fas fa-bars"></div>

            </div>

        </div>

    </header>

    <!-- header section ends -->