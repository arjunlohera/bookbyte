<?php

// This model is created to contain all the email related functions
// If you want to send a new type of email, just create it here and call it in the application.

class Mails extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('Mailer');
	}

	public function contact_us($data) {
		// send email
		$mail = $this->mailer->set_to($data['to_email'])
			->set_replyto($data['email'])
			->set_replyto_name($data['name'])
			->set_from_name($data['name'])
			->set_subject('New message from Contact us Page of your Website')
			->set_view('contact_us', $data)
			->send();
		return $mail;
	}

	public function forget_password($data) {
		// send email
		$mail = $this->mailer->set_to($data['to_email'])
			->set_view('reset', $data)
			->set_subject('Password for your '. APP_NAME . ' account.')
			->send();
		return $mail;
	}

	public function send_welcome_email($user) {
		// send email
		$mail = $this->mailer->set_to($user['email'])
			->set_view('welcome', $user)
			->set_subject('Welcome to '. APP_NAME)
			->send();
		return $mail;
	}
}
