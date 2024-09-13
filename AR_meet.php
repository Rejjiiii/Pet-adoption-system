<?php
	
	include 'db/config.php'; 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'phpmailer/src/PHPMailer.php';
	include 'phpmailer/src/SMTP.php';
	include 'phpmailer/src/Exception.php';

	if (isset($_POST['meet'])){
		$appid = $_POST['appid'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$schedule = $_POST['schedule'];
		$sql = "UPDATE adoptionrequest SET status='1' WHERE id = '$appid'";
		$run = mysqli_query($con,$sql);
		if($run == true){

			if(isset($_POST['meet'])) {
				$email = $_GET['email'];
				$firstname = $_GET['firstname'];
				$lastname = $_GET['lastname'];
				$schedule = $_GET['schedule'];

				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->Mailer = "smtp";

				$mail->SMTPDebug  = 1;  
				$mail->SMTPAuth   = TRUE;
				$mail->SMTPSecure = "tls";
				$mail->Port       = 587;
				$mail->Host       = "smtp.gmail.com";
				$mail->Username   = "regie649@gmail.com";
				$mail->Password   = "pxynupajpffysrrj";

				$mail->IsHTML(true);
				//Email ng client
				$mail->AddAddress($email);
				$mail->SetFrom("regie649@gmail.com", "Pet Adoption");
				$mail->Subject = "Schedule of Meeting.";
				$content = 
				"Respectfully, $firstname $lastname, <br><br>

					We are delighted to inform you that our Barangay San Francisco, Bulakan, Bulacan <br> 
				is hosting a seminar on Dog Adoption. The topic's main focus is to provide information <br> 
				on how to adopt and care for animals, as well as to provide a second home for stray dogs. <br><br> 
				
				The seminar will be held in Barangay San Francisco Bulakan, Bulacan, on $schedule, <br>
				and you are invited to attend. If you have a problem with your schedule, please contact us at 0906-061-8986. <br><br>
				
				We hope you will make time in your busy schedule for us. <br><br>
				
				Thank you so much.";
				//comment

				$mail->MsgHTML($content); 
				if(!$mail->Send()) {
				echo "Error while sending Email.";
				var_dump($mail);
				} else {
				echo 0;
				}
			}
			
			echo "<script> 
					alert('$email was sended an email for a meeting.');
					window.open('admin_adoptionrequest.php','_self');
				</script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
