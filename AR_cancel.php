<?php
	include'db/config.php'; 
	if (isset($_POST['cancel'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE adoptionrequest SET status='3' WHERE id = '$appid'";
		$run = mysqli_query($con,$sql);
		if($run == true){	
					
			echo "<script> 
					alert('Adoption Request cancel');
					window.open('admin_adoptionrequest.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
?>

