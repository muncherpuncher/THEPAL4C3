<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Email Library
 *
 * @package  embarket
 */

class MY_Email extends CI_Email
{
	private $CI;
	private $config = '';

	function __construct($data)
	{
		$this->CI =& get_instance();
		if (is_array($data)) {
			if (isset($data[0]) && ! empty($data[0])) {
				$config = strval($data[0]);
			} else {
				$config = 'default';
			}
			$this->CI->config->load('email', TRUE);
			$this->config = $this->CI->config->item($config, 'email');
			if ($this->config == NULL) {
				$this->config = $this->CI->config->item('default', 'email');
			}
		} else {
			die('ERROR: Email Configuration Error');
		}
		parent::__construct($this->config);
	}

	/**
	 * Send email notification
	 *
	 * @param string $email_to
	 * @param string $from
	 * @param string $subject
	 * @param mixed $message if(template) ? array : string
	 * @param string $file_path
	 * @return boolean TRUE: email sent, FALSE: error
	 */
	function send_email($type, $email_to, $from_name = '', $subject = '', $message = '', $file_path = NULL)
	{	
	
		if ( ! is_null($email_to) && ! empty($email_to) && is_string($email_to)) {
			if ( ! is_null($subject)) $this->subject(trim($subject));
			if (is_array($message)) $message = $this->_template($message, $file_path);
				
			switch ($type) {

				case 'local':
					
					 // Gmail SMTP
					$this->from(trim($from_name));
					$this->to(trim($email_to));	
					$this->message($message);
					if($this->send()) return TRUE;
					
					break;

				case 'live':

					// Default Mail Function
					$header = "";
					$header .= "Reply-To: <$from_name> <$from_name>\r\n";
					$header .= "Return-Path: <$from_name> <$from_name>\r\n";
					$header .= "From: <$from_name> <$from_name>\r\n";
					$header .= "Organization: The organization\r\n";
					$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					mail($email_to, $subject, $message, $header); 
					break;
				default:
					# code...
					break;
			}
			
			return TRUE;
			

		}
		return FALSE;
	}

	/**
	 * Get template for email
	 *
	 * @param array $message
	 * @param string $file_path
	 * @return string
	 */
	function _template($message, $file_path = NULL)
	{		

		if ($file_path != NULL) {
			if (file_exists(APPPATH.'views/email_templates/'.$file_path.EXT))
				$content = $this->CI->load->view('email_templates/'.$file_path, $message, TRUE);

		} else {
			$content = implode(' ', $message);
		}
		return $content;
	}
}