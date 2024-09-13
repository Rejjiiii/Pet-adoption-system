<?php
	include'db/config.php';  
	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE adoptionrequest SET status='2' WHERE id = '$appid'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Adoption Approved');
					window.open('admin_adoptionrequest.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>