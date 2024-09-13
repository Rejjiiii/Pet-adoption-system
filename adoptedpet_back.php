<?php
    include('db/functions.php');
    $petid = $_GET['id'];
    $query = "select * from `adopted` where `pet_id` = '$petid'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $petname = $row ['pet_name'];
            $petage = $row ['pet_age'];
            $petcolor = $row ['pet_color'];
            $vaccinated = $row ['vaccinated'];
            $breed = $row ['breed'];
            $description = $row ['description'];;
            $petimage1 = $row ['pet_img1'];
            $query = "INSERT INTO `petdetails` (`pet_id`, `pet_name`, `pet_age`, `pet_color`, `vaccinated`, `breed`, `description`, `pet_img1`) VALUES (NULL, '$petname','$petage','$petcolor','$vaccinated','$breed','$description','$petimage1');";
        }
        $query .= "DELETE FROM `adopted` WHERE `adopted`.`pet_id` = '$petid';";
        if(performQuery($query)){
            echo"<script>alert('The Pet is Succefully back into pet details')</script>";
			echo"<script>window.open('admin_adopted.php','_self')</script>";;
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>