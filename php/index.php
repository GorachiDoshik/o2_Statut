<?php 

/**
 * 
 */

	$userCalue = [
		'firstName' => 'Михаил',
		'lastName' => 'Мингалёв',
		'middleName' => 'Михайлович',
		'email' => 'mingalyovuxcheck@gmail.com',
		'phone' => '+7 910 832 26 28',
		'anotherPhone' => '',
	];

	$FirstName = $_POST["firstName"];
	$LastName = $_POST["lastName"];
	$MiddleName = $_POST["middleName"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$anotherPhone = $_POST["anotherPhone"];

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$newFirstName = $_POST["firstName"];
		$newLastName = $_POST["lastName"];
		$newMiddleName = $_POST["middleName"];
		$newPhone = $_POST["phone"];
		$newEmail = $_POST["email"];
		$newAnotherPhone = $_POST["anotherPhone"];


		$to  = "<mail@example.com>, " ; 
	$to .= "mail2@example.com>"; 

	$subject = "Заголовок письма"; 

	$message = ' <p>Текст письма</p> </br> <b>1-ая строчка </b> </br><i>2-ая строчка </i> </br>';

	$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
	$headers .= "From: От кого письмо <from@example.com>\r\n"; 
	$headers .= "Reply-To: reply-to@example.com\r\n"; 

	mail($to, $subject, $message, $headers); 
	var_dump(mail());
	}






