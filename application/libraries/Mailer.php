<?php

class Mailer {
	protected $ci;
	public $to;
	public $from;
	public $from_name;
	public $replyto_name;
	public $replyto;
	public $message;
	public $subject;
	public $errors;
	public $layout;
	public $sender_name;

	public function __construct() {
		$this->ci =& get_instance();
 
 
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'smtp.hostinger.in',
		    'smtp_port' => 587,
		    'smtp_user' => 'info@mybookbyte.com',
		    'smtp_pass' => 'k2ON1Snt',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		// only override for local development pc
		// if(gethostname() == 'DESKTOP-F5G1D6J') {
		// 	$config = Array(
		// 	    'protocol' => 'smtp',
		// 	    'smtp_host' => 'smtp.mailtrap.io',
		// 	    'smtp_port' => 465,
		// 	    'smtp_user' => '377ac0ec869f71',
		// 	    'smtp_pass' => 'b397bcfc78e10c',
		// 	    'mailtype'  => 'html', 
		// 	    'charset'   => 'iso-8859-1'
		// 	);
		// }


    $this->ci->load->library('email', $config);

		$this->ci->email->set_newline("\r\n");
	}

	public function get_to() {
		return $this->to;
	}

	public function set_to($value) {
		$this->to = $value;
		return $this;
	}

	public function get_from() {
		if(!$this->from) {
			return 'BOOKBYTE <info@mybookbyte.com>';
		} else {
			return $this->from;
		}
	}

	public function set_from($value) {
		$this->from = $value;
		return $this;
	}

	public function set_from_name($value) {
		$this->from_name = $value;
		return $this;
	}

	public function get_from_name(){
		if($this->sender_name) {
			return $this->sender_name;		
		}
		return $this->from_name;
	}

	public function get_message() {
		return $this->message;
	}

	public function set_message($value) {
		$this->message = $value;
		return $this;
	}

	public function set_layout($layout) {
		$this->layout = $layout;
		return $this;
	}

	public function set_view($viewname, $data = array()) {
		$message = $this->ci->load->view('emails/views/'. $viewname, $data, true);
		if($this->layout) {
			$content = $this->ci->load->view('emails/layouts/' . $this->layout, array('content' => $message), true);
		} else {
			$content = $this->ci->load->view('emails/layouts/default.php', array('content' => $message), true);
		}
		$this->message = $content;
		return $this;
	}

	public function get_subject() {
		return $this->subject;
	}

	public function set_subject($value) {
		$this->subject = $value;
		return $this;
	}

	public function set_replyto($email) {
		$this->replyto = $email;
		return $this;
	}

	public function set_replyto_name($name) {
		$this->replyto_name = $name;
		return $this;
	}

	public function send() {
		$this->ci->email->to($this->get_to());
		$this->ci->email->from($this->get_from(),$this->get_from_name());
		$this->ci->email->subject($this->get_subject());
		$this->ci->email->message($this->get_message());
		$this->ci->email->set_alt_message($this->get_message());
		if($this->replyto && $this->replyto_name) {
			$this->ci->email->reply_to($this->replyto, $this->replyto_name);
		} else if($this->replyto) {
			$this->ci->email->reply_to($this->replyto);
		}
		$sent = $this->ci->email->send();

 
		if(!$sent) {
			$this->errors = $this->ci->email;
			return $this->errors;
		}
		return $sent;
	}
}
