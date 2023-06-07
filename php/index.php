<!DOCTYPE html>
<?php


	// $userValue = [
	// 	'FirstName' => $_POST['firstName'],
	// 	'LastName' => $_POST["lastName"],
	// 	'MiddleName' => $_POST["middleName"],
	// 	'Email' => $_POST["email"],
	// 	'Phone' => $_POST["phone"],
	// 	'AnotherPhone' => $_POST["anotherPhone"],
	// 	'Born' => $_POST["day"] . " / " . $_POST["month"] . " / " . $_POST["year"],
	// 	'Sex' => $_POST['radio'],
	// ];


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$newFirstName = $_POST["firstName"];
		$newLastName = $_POST["lastName"];
		$newMiddleName = $_POST["middleName"];
		$newPhone = $_POST["phone"];
		$newEmail = $_POST["email"];
		$newAnotherPhone = $_POST["anotherPhone"];
		$newBorn = $_POST["day"] . " / " . $_POST["month"] . " / " . $_POST["year"];
		$newSex = $_POST['radio'];

		$errors = []; //Обработчик ошибок

		if(strlen($newFirstName) <= 3 || strlen($newFirstName) >25) //Проверка длины имени
		{
			$errors[]= "Имя слишком короткое или имеет слишком много символов <br>";
		}
		if(strlen($newLastName) <= 6 || strlen($newLastName) > 30) //Проверка длины фамилии
		{
			$errors[]= "Фамилия не может содержать меньше 6 символов или слишком много символов";
		}


		$chr_ru = "А-Яа-яЁё0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]"; //русские символы
		//Проверка на наличие НЕ русских символов в: Имени, Фамилии,
		if (!preg_match("/^[$chr_ru]+$/u", $newFirstName))
		{
			$errors[]= "Пожалуйста, введите ваше имя используя русские символы<br>";
		}
		if (!preg_match("/^[$chr_ru]+$/u", $newLastName))
		{
			$errors[]= "Пожалуйста, введите ваше фамилию используя русские символы<br>";
		}

		if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) // Проверка корректности почты
		{
			$errors[]= "Пожалуйста, введите вашу почту правильно<br>";
		}

		if(!preg_match("/^\+7 [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}$/", $newPhone, $anotherPhone)) // Проверка корректности номера
		{
			$errors[]= "Пожалуйста, введите корректно номер телефона<br>";
		}


		$year = $_POST["year"]; //дата года рождения пользователя
		$dateYear = date("Y"); //текущий год даты
		$IntervalAge = $dateYear - $year; //Возраст пользователя

		if ($IntervalAge < 16)	//Проверка пользователя на возраст
		{
			$errors[] = "Ваши данные не могут быть изменены, так как ваш возраст не соответствует правилам";
		}


		$to = "user@example.com";
		$subject = "Редактирование профиля";
		$headers = "From: o2Statut@gmail.com";

		// echo "<pre>"; print_r($userValue);

		if (!empty($errors))
		{	//Если обработчик не пустой, то выведет список ошибок
			foreach ($errors as $error)
			{
				echo "<pre>" ; print_r($error );
			}
			echo "<br><br><b>Письмо не может быть отправлено из-за вышеуказанных ошибок</b>";
		}
		else   //Если ошибки не было найдены, то отправится письмо
		{
			mail($to, $subject,
			"Имя: " .$newFirstName ."\n".
			"Фамилия: " .$newLastName ."\n".
			"Отчество: " .$newMiddleName ."\n".
			"Почта: " .$newEmail ."\n".
			"Телефон: " .$newPhone ."\n".
			"Пол: " .$newSex ."\n",
			$headers);
			echo '<span style = "color: green">Письмо отправлено успешно</span>';
		}

	}


