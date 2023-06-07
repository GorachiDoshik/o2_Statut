$(document).ready(function() {

	$('.personal-account_profile_form').submit(function(e) {
	  e.preventDefault();

	  // Получение данных из формы
	  let name = $('#name').val();
	  let lastName = $('#lastName').val();
	  let email = $('#email').val();


	  if (name === '' ) // Проверка на пустое поле в "Имя"
	  {
		$('#result__name').html('<span style="color: red; position: absolute;width: 100%;font-size: 14px;margin-left: 15px;margin-top: 15px;">Заполните ваше имя</span>');
	  }
	  else
	  {
	  	$('#result__name').html('<span style="display: none;">Заполните ваше имя</span>');
	  }

	  if (lastName === '' ) // Проверка на пустое поле в "Фамилия"
	  {
		$('#result__lastName').html('<span style="color: red; position: absolute;width: 100%;font-size: 14px;margin-left: 15px;margin-top: 15px;">Заполните вашу фамилию</span>');
	  }
	  else
	  {
	  	$('#result__lastName').html('<span style="display: none;">Заполните вашу фамилию</span>');
	  }

	  if (email === '' ) // Проверка на пустое поле в "email"
	  {
		$('#result__email').html('<span style="color: red; position: absolute;width: 100%;font-size: 14px;margin-left: 15px;margin-top: 15px;">Заполните ваш E-mail</span>');
	  }
	  else
	  {
	  	$('#result__email').html('<span style="display: none;">Заполните ваш E-mail</span>');
	  }

	  // Выполняем AJAX-запрос
	  $.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		data: $(this).serialize(),
		dataType: 'html',
		success: function(response) {
		  $('#result').html(response);
		},
		error: function(error){
			$('#result').html(error);
		}
	  });
	});
  });
  