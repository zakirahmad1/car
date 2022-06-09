<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);	
class User extends CI_Controller {
var $data=array('template'=>'template/light');
	/**
	 * Template variable if you want to change the new template
	 */
	   public function __construct() {
               parent::__construct();
               $this->load->model('user_model');
       }
	 
	 
	public function index()
	{	
	
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				
				
				if (!$this->form_validation->run() == FALSE)
                {
						
						$data=array('email'=>$this->input->post('email', TRUE),
									'password'=>$this->input->post('password', TRUE),
									);
									
					    $user= $this->user_model->fetch($data);
						//echo "<pre>";print_r($user);exit;
						
						if(isset($user->email)){
							
								$data['logged_in']=true;
								$this->session->set_userdata('session',$data);		
								$this->session->set_flashdata('msg', 'succussfully login');// flash msg 
								redirect('home', 'refresh');
						}else{
							$this->session->set_flashdata('msg', 'Incorrect email or password');// flash msg 
						}
						
												
                }
			 
		 }	
	
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		//echo "<pre>";print_r($this->data);
		$this->load->view($this->data['template'].'/home',$this->data);
	}
	
	  public  function randomPassword() {// generate random password
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}
		
	function check_email($email){
		 $sql="select name from `tbl_user` where email=?";
		 $where=array('email'=>$email);
		 $row=$this->user_model->query_row($sql,$where);
		// echo "<pre>";print_r($row);exit;
		 
		 
			if(isset($row->name)){
				return true;
			}else{
				return false;
			}
	
	}
	public function email_check($email)
        {		
				$validate=$this->check_email($email);// is email avaiable
					
                if ($validate)
                {
                        $this->form_validation->set_message('email_check', '{field} Already exist');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }	
		
	public function signup()
	{	
		
		
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
				
				if (!$this->form_validation->run() == FALSE)
                {
						$data=array('name'=>$this->input->post('name', TRUE),
									'email'=>$this->input->post('email', TRUE),
									'password'=>$this->randomPassword(),
									);
							$this->mailSent($data);		
					    $this->user_model->insert($data);
						$this->session->set_flashdata('msg', 'Plz check your email for password');// flash msg 
						redirect('user', 'refresh');						
                }
			 
		 }
		
			$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
			$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
			//echo "<pre>";print_r($this->data);
			$this->load->view($this->data['template'].'/signup',$this->data);
		 
	}
	
	public function mailSent($data){
		$this->load->library('email');
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		$this->email->to($data['email']);//$this->data['user']->user_email
		$this->email->from("zakirahmad@gmail.com",'Car project');
		$this->email->subject("Login Details");
		$this->data['email']=$data['email'];
		$this->data['first_name']=$data['name'];
		$this->data['password']=$data['password'];
		 $message=$this->load->view($this->data['template'].'/sigup_message',$this->data,true);

		$this->email->message($message);

		  if($this->email->send())
			{
					
		   }
	}
	
	public function logout(){
		$this->session->unset_userdata('session');
		redirect('user', 'refresh');
	}
        
	public function signup_api(){
		// API key
		$apiKey = '1234';

		// API auth credentials
		$apiUser = "admin";
		$apiPass = "1234";

		// API URL
		$url = site_url(array('api','user'));

		// User account info
		$userData = array(
			
			'name' => 'zakirahamd',
			'email' => "zakirahmad@gmail.com",
	
		);

		// Create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
		curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");
		//curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);

		$result = curl_exec($ch);
		// print_r($result);
		echo $result;
		// Close cURL resource
		curl_close($ch);
	}
	
}
