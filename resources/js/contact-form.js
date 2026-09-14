import $ from 'jquery';

$(function () {
	$('#contact-form').on('submit', function (e) {
		e.preventDefault();

		const $form = $(this);
		const $response = $('#form-response');
		const $inputs = $form.find('input, textarea, button');
		const $submitBtn = $form.find('button[type="submit"]');

		const ajaxUrl = '';

		$form.find('.field-error-msg').remove();
		$form.find('.error').removeClass('error');

		$inputs.prop('disabled', true);
		$form.addClass('opacity-50 pointer-events-none transition-opacity duration-300');
		$submitBtn.text('Küldés...');
		$response.fadeOut(100);

		$.ajax({
			url: ajaxUrl,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'send_contact_form',
				datas: $form.serializeArray(),
			},
			success: function (res) {
				if (res.status === 'error') {
					$.each(res.fields, function (i, item) {
						const $field = $form.find(`[name="${item.field}"]`);
						$field.addClass('error');
						$field.after(`<span class="field-error-msg mt-1 font-bold block">${item.message}</span>`);
					});

					$inputs.prop('disabled', false);
					$form.removeClass('opacity-50 pointer-events-none');
					$submitBtn.text('Üzenet küldése');
				} else {
					$response.text('Üzenet sikeresen elküldve!')
						.removeClass('hidden')
						.fadeIn();

					$form[0].reset();
					$submitBtn.text('Elküldve!');

					$inputs.prop('disabled', false);
					$form.removeClass('opacity-50 pointer-events-none');
				}
			},
			error: function () {
				$response.text('Hiba történt. Kérjük próbálja meg újra!')
					.removeClass('hidden')
					.fadeIn();

				$inputs.prop('disabled', false);
				$form.removeClass('opacity-50 pointer-events-none');
				$submitBtn.text('Üzenet küldése');
			}
		});
	});
});