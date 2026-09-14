<?php

namespace App\Actions;

class ContactForm
{
	public function __invoke()
	{
		$status = "success";
		$error_message_required = __('A mező kitöltése kötelező!', 'sage');
		$error_message_format = __('Nem megfelelő formátum!', 'sage');

		foreach ($_POST['data'] as $i) {
			$data[$i['name']] = $i['value'];
		}

		if (trim($data['name']) == '') {
			$status   = "error";
			$fields[] = array(
				'field' => 'name',
				'message' => $error_message_required
			);
		}

		if (trim($data['subject']) == '') {
			$status   = "error";
			$fields[] = array(
				'field' => 'subject',
				'message' => $error_message_required
			);
		}

		if (!isset($data['email']) || empty($data['email'])) {
			$status   = "error";
			$fields[] = array(
				'field' => 'email',
				'message' => $error_message_required
			);
		} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$status   = "error";
			$fields[] = array(
				'field' => 'email',
				'message' => $error_message_format
			);
		}

		if ($status == "success") {
			// Küldés...
			// $to      = get_option('admin_email');
			// $headers = ['Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>'];
			// $body    = "<h2>Új üzenet</h2><p><strong>Név:</strong> {$name}</p>"; // ... stb

			// if (wp_mail($to, 'Kontakt: ' . $subject, $body, $headers)) {
			//     wp_send_json_success('Üzenet elküldve!');
			// } else {
			//     wp_send_json_error(['general' => 'Szerver hiba.'], 500);
			// }
		}

		$return_value = ([
			'status' => $status,
			'fields' => $fields,
		]);

		echo json_encode($return_value);
		wp_die();
	}
}
