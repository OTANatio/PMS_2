<?php 
	$display = "none";
	if (isset($_POST['register'])) {
		include_once 'connector/dbhandler.php';


		function purify($data){
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = trim($data);
			return $data;
		}



		$firstname = mysqli_real_escape_string($conn, purify($_POST['firstname']));
		$surname = mysqli_real_escape_string($conn, purify($_POST['surname']));
		// $middlename = mysqli_real_escape_string($conn, purify($_POST['middlename']));
		// $username = mysqli_real_escape_string($conn, purify($_POST['username']));
		$email = mysqli_real_escape_string($conn, purify($_POST['email']));
		// $phonenumber = mysqli_real_escape_string($conn, purify($_POST['phonenumber']));
		// $occupation = mysqli_real_escape_string($conn, purify($_POST['occupation']));
		// $location = mysqli_real_escape_string($conn, purify($_POST['location']));
		// $skill = mysqli_real_escape_string($conn, purify($_POST['skill']));
		$company_name = mysqli_real_escape_string($conn, purify($_POST['company_name']));
		$password = mysqli_real_escape_string($conn, purify($_POST['password']));

		//Error Handlers

		$firstname_err=$surname_err=$email_err= $companyname_err = $password_err= "";


		//Checking for empty field
		if (empty($firstname)){
			$username_err = "FirstName Field Cannot be empty";

		}
		if (empty($surname)){
			$surname_err = "surname Field Cannot be empty";

		}		
		if (empty($company_name)){
			$companyname_err = "Company Name Field Cannot be empty";

		}
		if (empty($email)){
			$email_err = "Email Field Cannot be empty";

		}
		if (empty($password)){
			$password_err = "Password Field Cannot be empty";
			
		}else{

			//Check for valid inputs
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
				
				$firstname_err = "Wrong Format Of FirstName";

			}
			if (!preg_match("/^[a-zA-Z]*$/", $surname)) {
				
				$surname_err = "Wrong Format Of surname";

			}

			//Check for email validity
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					
				$email_err = "Wrong Format Of Email";

			}

			if(strlen($password)<=7){
					$password_err = "Password too short";
			}else{
					//Check if user already exist
					$sql = "SELECT * FROM users WHERE email='$email'";
					$result = mysqli_query($conn, $sql);
					$sqlresult = mysqli_num_rows($result);

					if ($sqlresult>0) {
						$email_err="email already exist";
					}else{

						//Security (Hashing The Password).
						$hashedpwd = password_hash($password, PASSWORD_BCRYPT);

	                    //Insert the contact informations into the database...
	                    $sql = "INSERT INTO users(firstname, surname, company_name, email, password) VALUES('$firstname', '$surname', '$company_name', '$email', '$hashedpwd');";
						mysqli_query($conn, $sql);

						header("refresh: 5, url=client-dashboard/index.php");
						$display = "block";
						
					}
				}


		}


	}else{
		
		$firstname_err=$surname_err=$email_err= $companyname_err = $password_err= "";
		
	}


 ?>