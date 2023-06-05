<?php 

/**
 * 
 */

	$userValue = [
		'FirstName' => $_POST['firstName'],
		'LastName' => $_POST["lastName"],
		'MiddleName' => $_POST["middleName"],
		'Email' => $_POST["email"],
		'Phone' => $_POST["phone"],
		'AnotherPhone' => $_POST["anotherPhone"],
		'Born' => $_POST["day"] . " / " . $_POST["month"] . " / " . $_POST["year"],
		'Sex' => $_POST['radio'],
	];

	// $FirstName = $_POST["firstName"];
	// $LastName = $_POST["lastName"];
	// $MiddleName = $_POST["middleName"];
	// $phone = $_POST["phone"];
	// $email = $_POST["email"];
	// $anotherPhone = $_POST["anotherPhone"];

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$newFirstName = $_POST["firstName"];
		$newLastName = $_POST["lastName"];
		$newMiddleName = $_POST["middleName"];
		$newPhone = $_POST["phone"];
		$newEmail = $_POST["email"];
		$newAnotherPhone = $_POST["anotherPhone"];

		$errors = [];

		if(strlen($newFirstName) < 3 || strlen($newFirstName) >25)
		{
			$errors[]= "Имя слишком короткое или имеет слишком много символов <br>";
			
		}



		if(strlen($newLastName) < 6)
		{
			$errors[]= "Фамилия не может содержать меньше 6 символов";
			
		}

		

		echo "<pre>"; print_r($userValue);

		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<pre>"; print_r($error);
			}
		}
	}







