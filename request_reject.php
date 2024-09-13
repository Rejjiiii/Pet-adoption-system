<?php
    include('db/functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script> 
					alert('Account has been rejected.');
					window.open('admin_request.php','_self');
				  </script>";            
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>