$(document).ready(function() {

	$('.personal-account_profile_form').submit(function(e) {
	  e.preventDefault();

	  // Получение данных из формы
	  var name = $('#name').val();
	  var email = $('#email').val();


	  if (name === '' ) {
		$('#result__name').html('<span style="color: red; position: absolute;width: 100%;font-size: 14px;margin-left: 15px;margin-top: 15px;">Пожалуйста, заполните ваше имя</span>');
		return;
	  }

	  // Выполняем AJAX-запрос
	  $.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		data: $(this).serialize(),
		dataType: 'html',
		success: function(response) {
		  $('#result').html(response); // Вывод полученного HTML-кода в контейнер с идентификатором 'result'
		},
		error: function(xhr, status, error) {
		  console.log(error); // Вывод сообщения об ошибке в консоль
		}
	  });
	});
  });
  