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
			$errors[]= '<span style="color: #f73939;">Имя слишком короткое или имеет много символов</span> <br>';
		}
		if(strlen($newLastName) <= 6 || strlen($newLastName) > 30) //Проверка длины фамилии
		{
			$errors[]= '<span style="color: #f73939;">Фамилия слишком короткое или имеет много символов</span> <br>';
		}


		$chr_ru = "А-Яа-яЁё0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]"; //русские символы
		//Проверка на наличие НЕ русских символов в: Имени, Фамилии,
		if (!preg_match("/^[$chr_ru]+$/u", $newFirstName))
		{
			$errors[]= '<span style="color:#f73939;">Введите ваше имя используя русские символы</span><br>';
		}
		if (!preg_match("/^[$chr_ru]+$/u", $newLastName))
		{
			$errors[]= '<span style="color:#f73939;">Введите вашу фамилию используя русские символы</span><br>';
		}


		if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) // Проверка корректности почты
		{
			$errors[]= '<span style="color: #f73939;">Введите вашу почту правильно</span><br>';
		}

		if(!preg_match("/^\+7 [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}$/", $newPhone, $anotherPhone)) // Проверка корректности номера
		{
			$errors[]= '<span style="color: #f73939;">Введите корректно номер телефона</span><br>';
		}

		if ($newAnotherPhone == $newPhone) {
			$errors[]= '<span style="color: #f73939;">Дополнительный номер идентичен основному номеру</span><br>';
		}


		$year = $_POST["year"]; //дата года рождения пользователя
		$dateYear = date("Y"); //текущий год даты
		$IntervalAge = $dateYear - $year; //Возраст пользователя

		if ($IntervalAge < 16)	//Проверка пользователя на возраст
		{
			$errors[] = '<span style="color: #f73939">Ваш возраст ниже 16 лет</span>';
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
			"Доп.номер: " .$newAnotherPhone ."\n".
			"Пол: " .$newSex ."\n",
			$headers);
			echo '<span style = "color: green">Письмо отправлено успешно</span>';
		}

	}


