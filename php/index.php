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
		$newBorn = $_POST["day"] . " / " . $_POST["month"] . " / " . $_POST["year"];
		$newSex = $_POST['radio'];

		$errors = [];

		if(strlen($newFirstName) < 3 || strlen($newFirstName) >25)
		{
			$errors[]= "Имя слишком короткое или имеет слишком много символов <br>";
			
		}
		
		$year = $_POST["year"];
		$dateYear = date("Y");
		$IntervalAge = $dateYear - $year;
		if ($IntervalAge < 16) {
			$errors[] = "Ваши данные не могут быть изменены, так как ваш возраст не соответствует правилам";
		}

		if(strlen($newLastName) < 6)
		{
			$errors[]= "Фамилия не может содержать меньше 6 символов";
			
		}
		$to = "user@example.com";
		$subject = "Редактирование профиля";
		$message = "Данные изменены";

		echo "<pre>"; print_r($userValue);

		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<pre>" ; print_r($error );

			}
			echo "<br><br>Письмо не может быть отправлено из-за вышеуказанных ошибок";
		}
		else{
			mail($to, $subject, 
			"Имя: " .$newFirstName ."\n".
			"Фамилия: " .$newLastName ."\n".
			"Отчество: " .$newMiddleName ."\n".
			"Почта: " .$newEmail ."\n".
			"Телефон: " .$newPhone ."\n".
			"Пол: " .$newSex ."\n",);
			echo "Письмо отправлено успешно";
		}

	
	}







