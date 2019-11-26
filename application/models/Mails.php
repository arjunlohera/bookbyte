<?php

// This model is created to contain all the email related functions
// If you want to send a new type of email, just create it here and call it in the application.

class Mails extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function contact_us($data) {
		$this->load->library('Mailer');
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
		$this->load->library('Mailer');
		// send email
		$mail = $this->mailer->set_to($data['to_email'])
			->set_view('reset', $data)
			->set_subject('Reset password for your '. APP_NAME . ' account.')
			->send();
		return $mail;
	}

	public function forget_username_email($email, $type) {
		$this->load->library('Mailer');
		$this->load->model('Drivermodel');
		$driver = $this->Drivermodel->condition(array('email' => $email))->get()->row();
		// parameters
		$link = site_url('login');
		// send email
		$mail = $this->mailer->set_to($email)
			->set_view('reset_username', array('username' => $driver->username, 'link' => $link, 'type' => $type))
			->set_subject('Recover username for your '. config_item('site_name') . ' account.')
			->send();
		return $mail;
	}

	// currently this function is for company only
	public function send_registration_email($user) {
		$this->load->library('Mailer');
		$this->load->model('Company');
		// parameters
		$code = $this->Company->create_confirm_token($user->company_id);
		$link = site_url('login/confirm_email') . '?code=' . $code;
		// send email
		$mail = $this->mailer->set_to($user->email)
			->set_view('registration', array('username' => $user->username, 'link' => $link))
			->set_subject('Please confirm your '. config_item('site_name') .' account.')
			->send();
		return $mail;
	}

	public function send_welcome_email($user) {
		$this->load->library('Mailer');
		// parameters
		$link = site_url('login');
		// send email
		$mail = $this->mailer->set_to($user->email)
			->set_view('confirmed', array('username' => $user->username, 'link' => $link))
			->set_subject('Welcome to your '. config_item('site_name') . ' account.')
			->send();
		return $mail;
	}

	

	

        public function update_module_request($module_id, $status, $reason = '') {
            $this->load->library('Mailer');
            $this->load->model('Module');
            $module = $this->Module->condition(array('module_id' => $module_id))->get()->row();
            
            $link = site_url('Company/Console/install_module/' . $module_id);
            
            $mail = $this->mailer->set_to($this->Auth->get_user_email())
                    ->set_view('module_update', array(
                        'link' => $link, 
                        'module_id' => $module_id, 
                        'status' => $status, 
                        'reason' => $reason
                    ))
                    ->set_subject('Your request to install module ' . $module->module_name . ' is ' . $status)
                    ->send();
            return $mail;
        }
        
        public function notify_email_changed($company_id, $old_email, $new_email) {
		$this->load->library('Mailer');
		$this->load->model('Company');
		$company = $this->Company->condition(array('company_id' => $company_id))->get()->row();
		// send email
		$mail = $this->mailer->set_to($company->email)
			->set_view('notify-email-changed', array('company' => $company, 'old_email' => $old_email, 'new_email' => $new_email))
			->set_subject('Email has been changed for your '. config_item('site_name') . ' account.')
			->send();
		return $mail;
	}

	public function notify_password_changed($company_id) {
		$this->load->library('Mailer');
		$this->load->model('Company');
		$company = $this->Company->condition(array('company_id' => $company_id))->get()->row();
		// send email
		$mail = $this->mailer->set_to($company->email)
			->set_view('notify-password-changed', array('company' => $company))
			->set_subject('Password has been changed for your '. config_item('site_name') . ' account.')
			->send();
		return $mail;
	}

	public function send_shared_link($data){
		$this->load->library('Mailer');
		// send email
		$mail = $this->mailer->set_to($data['to_email'])
			->set_view('share-documents', array('link' => $data['link']))
			->set_subject('Your Document'. config_item('site_name') . ' account.')
			->send();
		return $mail;
	}
	public function send_password($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['email'])
			->set_view('send_password', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}

	public function send_email($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['old_email'])
			->set_view('send_email', $data)
		
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}
	public function send_customer_email($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['old_email'])
			->set_view('send_customer_email', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}

	public function send_customer_username($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['old_email'])
			->set_view('send_customer_username', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}

	public function send_customer_password($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['email'])
			->set_view('send_customer_password', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}

	public function driver_apllication_resend($driver_id, $company_id)
	{
		$this->load->library('Mailer');
		$driver = $this->db->where('driver_id', $driver_id)->get('driver')->row();
		$driver->company = $this->db->where('company_id', $company_id)->get('company')->row();
		
		$mail = $this->mailer->set_to($driver->email)
							 ->set_view('driver_apllication_resend', $driver)
							 ->set_subject('Your Application Voided')
							 ->send();
		return $mail;
	}

	public function send_form_fill_invite($user,$link,$company_name = false){
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($user->email)
			->set_view('form_fill_invite', array('name' => $user->first_name .' ' . $user->last_name, 'link' => $link,'company_name' => (($company_name) ? $company_name :  config_item('site_name'))))
			->set_subject('Invitation for interview - '. (($company_name) ? $company_name :  config_item('site_name')) . ' .')
			->send();
		return $mail;
	}

	public function send_document_request($data){
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['receiver_user_email'])
			->set_view('send_document_request', $data)
			->set_subject('Document Request - '.config_item('site_name') . ' .')
			->send();
		return $mail;
	}

	public function send_driver_key($data, $driver_id = 0,$company_id = false){
		$this->load->library('Mailer');

		if($driver_id) {
			/* Generate and send pdf as attachment */
			$this->load->library('EmploymentApplicationForm');
			$invoice = new EmploymentApplicationForm();
			$invoice->set_driver_id($driver_id);
			$invoice->set_company_id($company_id);
			$invoice->generate();
			$form_number = $invoice->get_form_number();
			$invoice->setTitle($form_number);
			$attachment_string = $invoice->output($form_number .'.pdf','S');
		}

		$GLOBALS['__company_id'] = $company_id; 

		$form = $this->db->where('company_id', $company_id)->get('company_forms')->row();
		$data['company_user'] = $this->db->where('company_id', $company_id)->get('company')->row()->username;
		
		$company_data = $this->db->where('company_id', $company_id)->get('company')->row();
		$hr_info = $this->db->where('company_id', $company_id)->where('post_id', $data['post_id'])->get('job_post')->row();

		if ($form->alert_enabled && $form->alert_completed_enabled)
		{
			if($form->alert_emails)
			{
				$mail = $this->mailer->set_to($form->alert_emails)
				->set_view('alert_completed_job', $data)
				->set_subject('New User Completed Job Application.');

				$this->email->attach($attachment_string, 'attachment', $form_number . '.pdf', 'application/pdf');
				// send email
				$mail->send();
			}
		}

		$this->email->clear(TRUE);

		$mail = $this->mailer->set_to($data['email'])
			->set_view('send_driver_key', $data)
			/*->set_from($hr_info->hr_email)
			->set_from_name($company_data->company_name)*/
			->set_subject('Your Application');
		if($driver_id) {
			// add attachment to email
			$this->email->attach($attachment_string, 'attachment', $form_number . '.pdf', 'application/pdf');
		}

		// send email
		$mail->send();

		return $mail;
	}


	public function alert_started_job($data, $emails){
		$this->load->library('Mailer');

		$GLOBALS['__company_id'] = $data['company_id']; 
		$mail = $this->mailer->set_to(explode(',', trim($emails)))
				->set_view('alert_started_job', $data)
				->set_subject('New User Started Job Application.');

		// send email
		$mail->send();

		return $mail;
	}


	public function resend_driver_key($data){
		$this->load->library('Mailer');

		$company_data = $this->db->where('company_id', $data['company_id'])->get('company')->row();
		$hr_info = $this->db->where('company_id', $data['company_id'])->where('post_id', $data['post_id'])->get('job_post')->row();

		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('resend_driver_key', $data)
							/* ->set_from($hr_info->hr_email)
							 ->set_from_name($company_data->company_name)*/
							 ->set_subject('Your Application')
							 ->send();

		return $mail;
	}

	public function notify_email_changed_verification($company_id, $old_email, $new_email) {
		$this->load->library('Mailer');
		$this->load->model('Verificationmodel');
		$company = $this->Verificationmodel->condition(array('company_id' => $company_id))->get()->row();
		// send email
		$mail = $this->mailer->set_to($company->email)
			->set_view('notify-email-changed-verification', array('company' => $company, 'old_email' => $old_email, 'new_email' => $new_email))
			->set_subject('Email has been changed for your '. config_item('site_name') . ' verification service account.')
			->send();
		return $mail;
	}

	public function send_verification($data){
		$this->load->library('Mailer');

		$count = $this->db->where('verification_request_id', $data['request_id'])
			->count_all_results('verification_request_resends');
		$data['times'] = $count;

		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_verification', $data)
							 ->set_subject('Verification Invitation');
		$this->email->attach($data['autorization_form'],'', 'Authorization_form.pdf');
		
		// send email
		$mail->send();

		return $mail;
	}

	public function send_verification_notification($data){
		$this->load->library('Mailer');

		$count = $this->db->where('verification_request_id', $data['request_id'])
			->count_all_results('verification_request_resends');
		$data['times'] = $count;

		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_verification_notification', $data)
							 ->set_subject('New Verification Request');
		$this->email->attach($data['autorization_form'],'', 'Authorization_form.pdf');
		
		// send email
		$mail->send();

		return $mail;
	}

	public function resend_verification_notification($data){
		$this->load->library('Mailer');

		$count = $this->db->where('verification_request_id', $data['request_id'])
			->count_all_results('verification_request_resends');
		$data['times'] = $count +1;
		
		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_verification_notification', $data)
							 ->set_subject('Reminder: Verification Request');
		$this->email->attach($data['autorization_form'],'', 'Authorization_form.pdf');
		
		// send email
		$mail->send();
		if($mail) {
			/*$this->db->insert('verification_request_resends', [
				'verification_request_id' => $data['verification_request_id'],
				'sent_at' => date('Y-m-d H:i:s')
			]);*/
		}
		return $mail;
	}

	public function decline_verification_notification($data){
		$this->load->library('Mailer');

		$count = $this->db->where('verification_request_id', $data['request_id'])
			->count_all_results('verification_request_resends');
		$data['times'] = $count +1;
		
		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_verification_notification_declined', $data)
							 ->set_subject('Please re-send satisfactory response');
		$this->email->attach($data['autorization_form'],'', 'Authorization_form.pdf');
		
		// send email
		$mail->send();
		if($mail) {
			$this->db->insert('verification_request_resends', [
				'verification_request_id' => $data['verification_request_id'],
				'sent_at' => date('Y-m-d H:i:s')
			]);
		}
		return $mail;
	}

	public function verification_responded_notification($data) {
		$this->load->library('Mailer');

		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_verification_responded', $data)
							 ->set_subject('Verification Response');
		$this->email->attach($data['response'],'', 'Response.pdf');
		
		// send email
		$mail->send();
		if($mail) {
			// $this->db->insert('verification_request_resends', [
			// 	'verification_request_id' => $data['verification_request_id'],
			// 	'sent_at' => date('Y-m-d H:i:s')
			// ]);
		}
		return $mail;
	}

	public function notify_password_changed_verification($company_id) {
		$this->load->library('Mailer');
		$this->load->model('Verificationmodel');
		$company = $this->Verificationmodel->condition(array('company_id' => $company_id))->get()->row();
		// send email
		$mail = $this->mailer->set_to($company->email)
			->set_view('notify-password-changed-verification', array('company' => $company))
			->set_subject('Password has been changed for your '. config_item('site_name') . ' verification service account.')
			->send();
		return $mail;
	}

	public function forget_password_email_verification($email) {
		$this->load->library('Mailer');
		$this->load->model('Verificationmodel');
		$company = $this->Verificationmodel->condition(array('email' => $email))->get()->row();
		// parameters
		$link = site_url('tmsfalcon/forgot_reset') . '?' . http_build_query(array(
				'code' => $this->Verificationmodel->create_reset_token($company->company_id)
			));
		// send email
		$mail = $this->mailer->set_to($email)
			->set_view('reset', array('username' => $email, 'link' => $link, 'type' => 'COMPANY'))
			->set_subject('Reset password for your '. config_item('site_name') . ' verification service account.')
			->send();
		return $mail;
	}

	public function send_company_administrator_email($data){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data->email)
			->set_view('send_company_email',$data)
			->set_subject('Regarding Maintenance ')
			->send();

		return $mail;
	}

	public function send_administrator_email($data){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data->email)
			->set_view('send_company_email', $data)
			->set_subject('Regarding Maintenance')
			->send();
		return $mail;
	}

	public function send_driver_email($data){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['driver']->email)
			->set_view('send_driver_maintenance_email', $data)
			->set_subject('Regarding Maintenance')
			->send();

		return $mail;
	}

	public function send_driver_forgot_email($data){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['new_email'])
			->set_view('send_driver_email', $data)
			->set_subject('Email Updated')
			->send();

		return $mail;
	}
	
	public function send_invoice($load_id){
		$this->load->library('Mailer');

		$load = $this->db->where('load_id', $load_id)
			->get('load')
			->row();
		$this->load->model('Loads');
		$this->load->model('Documents');
		$invoice = $this->Loads->create_invoice($load->load_id, $load->remit_to_address_type);
		$invoice->save_to_db();
		$this->Documents->save_load_invoice($invoice);
		$filename = $invoice->get_invoice_number() . '.pdf';

		$customer = $this->db->where('customer_id', $load->customer_id)
			->get('customer')
			->row();
		//$customer->email = 'davinder00923@gmail.com'; // only for testing

		$data = array(
			'load' => $load,
			'customer' => $customer
		);
		$mail = $this->mailer->set_to($customer->email)
			->set_view('send_invoice', $data)
			->set_subject('Invoice for ' . $load->load_number);
		$this->email->attach($invoice->output($filename, 'S') ,'', $filename, 'application/pdf');
		
		// send email
		$mail->send();

		return $mail;
	}

	public function day_off_request_notification($driver, $status){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($driver->email)
							 ->set_view('day_off_request_notification', array('driver' => $driver, 'status' => $status))
							 ->set_subject('Your Day off request - ' . (($status) ? 'Accepted' : 'Rejected') )
							 ->send();
	}

	public function send_calllog_quote($calllog_id, $email){
		$this->load->library('Mailer');

		$this->load->library('LoadQuote');
		$quote = new LoadQuote();
		$quote->set_calllog_id($calllog_id);
		$quote->select_main_address();
		$quote->generate();

		$filename = 'Quote.pdf';

		//$email = 'davinder00923@gmail.com'; // only for testing

		$data = array(
			'calllog_id' => $calllog_id,
			'company' => $this->db->where('calllog_id', $calllog_id)->join('company', 'company.company_id = calllogs.company_id')->from('calllogs')->select('company.*')->get()->row(),
			'agent' => $this->db->query("SELECT * FROM dispatcher WHERE dispatcher_id IN 
				(SELECT dispatcher_id FROM dispatcher_access_controls WHERE driver_id IN (SELECT driver_id FROM calllog_drivers WHERE calllog_id = '{$calllog_id}') )
			")->row()
		);
		$mail = $this->mailer->set_to($email)
			->set_view('send_quote', $data)
			->set_subject('Quote for Call log #' . $calllog_id);
		$this->email->attach($quote->output($filename, 'S') ,'', $filename, 'application/pdf');
		

		//echo $this->mailer->get_message();exit;
		// send email
		$mail->send();

		return $mail;
	}

	public function send_envelope($data)
	{	
		$subject = 'Please review documents for envelope: '. $data['envelope_name'];
		if(!empty($data['subject'])) {
			$subject = $data['subject'];
		}
		
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['emailAddress'])
							 ->set_view('send_envelope', $data)
							 ->set_subject( $subject )
							 ->send();
	}

	public function send_mail_by_driver($data, $file)
	{	

		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_mail_by_driver', $data, true)
							 ->set_subject($data['subject'] );

		$this->email->attach(file_get_contents($file),'attachment', 'Document' . '.pdf', 'application/pdf');

		if($mail->send())
        {
          return true;
        }
        else
        {
         return false;
        }
		
	}

	public function send_fax_by_driver($data, $file)
	{	

		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['fax'])
							 ->set_view('send_mail_by_driver', $data, true)
							 ->set_from('noreply@mail.tmsfalcon.com')
							 ->set_subject('')
							 ->set_subject('TMSFALCON-FAX'); 

		$this->email->attach(file_get_contents($file),'attachment', 'Document' . '.pdf', 'application/pdf');

		if($mail->send())
        {
          return true;
        }
        else
        {
         return false;
        }
		
	}

public function send_rc_email($data)
	{	

		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('send_mail_by_driver', $data, true)
							 //->set_from('noreply@mail.tmsfalcon.com')
							 ->set_subject($data['subject'])
							 ->set_from_name($data['sender_name'])
							 ->set_message($data['message']);

		if($mail->send())
        {
          return true;
        }
        else
        {
         return false;
        }
		
	}

	public function send_fax_by_user($fax,$data,$id){
		$this->load->library('Mailer');

		$file_path = $this->db->where("u_id",$id)
								->get("document_paths")
								->row();

		$this->load->model("Docrouter");


	      $company = $this->db->where('company_id',$data->company_id)->get('company')->row();
	      $upload_dir = $this->Docrouter->upload_route_raw;
	      $upload_dir = str_replace("{company_id}",$company->company_id, $upload_dir );  
	      $upload_dir = str_replace("{hash_val}" ,$company->directory_hash_value, $upload_dir );  
	     

	     $source_layer_url_template = "{company_folder}/PDFFILLER{parent_path}/";
	     $source_layer_url_template = str_replace("{company_folder}",$upload_dir,$source_layer_url_template);
	     $source_layer_url_template = str_replace("{parent_path}",$file_path->parent_path,$source_layer_url_template);
	     $source_layer_url_template .= $file_path->path_name;
		$mail = $this->mailer->set_to($fax)
							 ->set_view('send_mail_by_driver', $data, true)
							 ->set_from('noreply@mail.tmsfalcon.com')
							 ->set_subject('');

		$this->email->attach(file_get_contents($source_layer_url_template),'attachment', 'Document' . '.pdf', 'application/pdf');

		if($mail->send())
        {
          return true;
        }
        else
        {
         return false;
        }
	}


	public function send_fax_by_company($fax,$data,$id){
		$this->load->library('Mailer');

		$file_path = $this->db->where("u_id",$id)
								->get("document_paths")
								->row();

		$this->load->model("Docrouter");


	      $company = $this->db->where('company_id',$data->company_id)->get('company')->row();
	      $upload_dir = $this->Docrouter->upload_route_raw;
	      $upload_dir = str_replace("{company_id}",$company->company_id, $upload_dir );  
	      $upload_dir = str_replace("{hash_val}" ,$company->directory_hash_value, $upload_dir );  
	     

	     $source_layer_url_template = "{company_folder}{parent_path}/";
	     $source_layer_url_template = str_replace("{company_folder}",$upload_dir,$source_layer_url_template);
	     $source_layer_url_template = str_replace("{parent_path}",$file_path->parent_path,$source_layer_url_template);
	     $source_layer_url_template .= $file_path->path_name;
		$mail = $this->mailer->set_to($fax)
							 ->set_view('send_mail_by_driver', $data, true)
							 ->set_from('noreply@mail.tmsfalcon.com')
							 ->set_subject('');

		$this->email->attach(file_get_contents($source_layer_url_template),'attachment', 'Document' . '.pdf', 'application/pdf');

		if($mail->send())
        {
          return true;
        }
        else
        {
         return false;
        }
	}

	public function send_by_driver_invite_signature($data)
	{	
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['emailAddress'])
							 ->set_view('send_by_driver_invite_signature', $data, true)
							 ->set_subject('Signature Invite');

		
		if($mail->send())
        {
          return true;
        }
        else
        {
          return false;
        }
		
	}

	public function send_by_driver_send_signature($data)
	{	
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['emailAddress'])
							 ->set_view('send_by_driver_send_signature', $data, true)
							 ->set_subject('Signature request');

		
		if($mail->send())
        {
          return true;
        }
        else
        {
          return false;
        }
		
	}

	public function compose_approval($email, $subject, $dom, $driver_id = 0){
		$this->load->library('Mailer');

		$driver 	  = $this->db->where('driver_id', $driver_id)->where('company_id', $this->Auth->get_company_id())->get('driver')->row();
		if ($driver) {
			$company_data = $this->db->where('company_id', $driver->company_id)->get('company')->row();
			$hr_info 	  = $this->db->where('company_id', $driver->company_id)->where('post_id', $driver->post_id)->get('job_post')->row();
		}	  
		
		//Send email
		$mail = $this->mailer->set_to($email)
							 ->set_view('insert_dom', array('dom' => $dom))
							 ->set_subject($subject);

		$mail = $this->mailer->send();
		return $mail;
	}

	public function document_rejected($document_type_id, $interview_id){
		$this->load->library('Mailer');
		
		$document_type = $this->db->where('document_type_id', $document_type_id)->get('document_types')->row();
		$schedule = $this->db->where('schedule_id', $interview_id)->get('schedule_interview')->row();

		// send email
		$mail = $this->mailer->set_to($schedule->email)
							 ->set_view('document_rejected', array('document_type' => $document_type, 'schedule' => $schedule))
							 ->set_subject('Your Uploaded Document Rejected.')
							 ->send();
		return $mail;
	}

	public function send_expire_document_email($data,$document){
		$this->load->library('Mailer');

		$mail = $this->mailer->set_to($data->email)
							->set_view('send_expire_documents',array('driver'=>$data,'document'=>$document))
							->set_subject('Expired Documents')
							->send();

		return $mail;
	}

	/**
	 * This method send an email with contact_us information
	 * Date: 05/04/2019
	 * @rjun 
	 */

	

	public function request_approval_cash_limit($data){
		$this->load->library('Mailer');
		$mail = $this->mailer->set_to($data['email'])
							 ->set_view('request_approval_cash_limit', $data, true)
							 ->set_subject('Higher Cash Limit Request');

		
		if($mail->send())
        {
          return true;
        }
        else
        {
          return false;
        }
	}

	/**AK:1 */
	public function send_password_to_vendor($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['email'])
			->set_view('send_password_to_vendor', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}

	public function send_vendor_email($data) {
		$this->load->library('Mailer');
		
		// send email
		$mail = $this->mailer->set_to($data['old_email'])
			->set_view('send_vendor_email', $data)
			->set_subject('Welcome to '. config_item('site_name') )
			->send();
		return $mail;
	}
	/**AK:0 */
}
