<?php

// // Message carrier (gotten form your web server)

// $to = "12345678@vtext.com";
// // $from = emailof the senederemail@gmail.com

// $Message = "Message to send";

// $header = "From: $from\n";

// mailto($to, "subject", $Message, $header);


// sms domain gateway
// Varizon Wireless - vtext.com
// Virgin Mobile - vmobl.com
// Alltel - sms.alltelwireless.com
// ATT - txt.att.net
// Boost Mobile - sms.myboostmobile.com
// Republic Wireless - text.republicwireless.com
// Sprint - messaging.sprintpcs.com
// T-Mobile - tmomail.net
// U.S. Cellular - emeail.uscc.net

?>



<?php 
	$display = "none";
	if (isset($_POST['contact'])) {
		include_once 'connector/dbhandler.php';


		function purify($data){
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = trim($data);
			return $data;
		}



		$name = mysqli_real_escape_string($conn, purify($_POST['name']));
		$email = mysqli_real_escape_string($conn, purify($_POST['email']));
		$phonenumber = mysqli_real_escape_string($conn, purify($_POST['phonenumber']));
		$subject = mysqli_real_escape_string($conn, purify($_POST['subject']));
		$message = mysqli_real_escape_string($conn, purify($_POST['message']));

		//Error Handlers

		$name_err= $email_err= $phonenumber_err= $subject_err= $message_err= "";


		//Checking for empty field
		if (empty($name)){
			$name_err = "Name Field Cannot be empty";

		}
		if (empty($email)){
			$email_err = "Email Field Cannot be empty";

		}
		if (empty($phonenumber)){
			$phonenumber_err = "PhoneNumber Field Cannot be empty";

		}
		if (empty($subject)){
			$subject_err = "Subject Field Cannot be empty";
			
		}
		if (empty($message)){
			$message_err = "Message Field Cannot be empty";

		}else{

			//Check for valid inputs
			if (!preg_match("/^[a-zA-Z]*$/", $name)) {
				
				// $name_err = "Wrong Format Of Name";

			}

			//Check for email validity
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					
				$email_err = "Wrong Format Of Email";

			}

			//Check for phonenumber validity
			if (strlen($phonenumber)<=7) {
					
				$phonenumber_err = "Invalid Phone Number";

			}else{

				$sql = "SELECT * FROM contacts WHERE name='$name' AND email='$email' AND subject='$subject'  AND message='$message'";
					$result = mysqli_query($conn, $sql);
					$sqlresult = mysqli_num_rows($result);

					if ($sqlresult>0) {
						$message_err="We already have this same complain from you";
						$email_err="We already have this same complain from you";
					}else{
				
				    //Insert the contact informations into the database...
	                    $sql = "INSERT INTO contacts(name, phonenumber, email, subject, message) VALUES('$name', '$phonenumber', '$email', '$subject', '$message');";
						
						mysqli_query($conn, $sql);

						$display = "block";
						
				}

			}
		}


	}else{
		$name_err= $email_err= $phonenumber_err= $subject_err= $message_err= "";
		
	}


 ?>







