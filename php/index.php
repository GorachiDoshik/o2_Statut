<?php

		

		
		
echo "Данные успешно обновлены.";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$MiddleName = $_POST["MiddleName"];
	$email = $_POST["email"];

	$to = "dadohanov1@mail.ru";
  
	

	$subject = "Новое сообщение от " . $FirstName;
  
	// Создаем тело письма
	$body = "Имя: " . $FirstName . "\n";
	$body .= "Email: " . $email . "\n";
  
	// Устанавливаем заголовки
	$headers = "From: " . $email . "\r\n";
	$headers .= "Reply-To: " . $email . "\r\n";

	// Отправляем письмо
	if (empty($email) || empty($LastName) || empty($FirstName) || empty($MiddleName)) {
		echo "Пожалуйста, заполните все поля.";
		if (mail($to, $subject, $body, $headers)) {
			echo "Письмо успешно отправлено!";
		  } else {
			echo "Ошибка при отправке письма.";
		  }
		return;
	}
	echo "Pismo otrp";
  }
	
