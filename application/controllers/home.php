<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);	
class home extends CI_Controller {
var $data=array('template'=>'template/light/admin');
	/**
	 * Template variable if you want to change the new template
	 */
	   public function __construct() {
               parent::__construct();
               $this->load->model('user_model');
			   if(!$this->session->has_userdata('session')){
				   redirect('user', 'refresh');
			   }
       }
	 
	 
	public function index()
	{	
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		$this->data['left_nav']=$this->load->view($this->data['template'].'/includes/left-nav',array(),true);
		$this->data['top_nav']=$this->load->view($this->data['template'].'/includes/top-nav',array(),true);
		
		$this->data['body']=$this->load->view($this->data['template'].'/pages/car/list',array(),true);//main content area
		//echo "<pre>";print_r($this->data);
		$this->load->view($this->data['template'].'/index',$this->data);
	}
	
	

		
	
	
	
        

	
}
