<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);	
class Car extends CI_Controller {
var $data=array('template'=>'template/light/admin');
	/**
	 * Template variable if you want to change the new template
	 */
	   public function __construct() {
               parent::__construct();
               $this->load->model('car_model');
			    $this->load->model('category_model');
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
		$data['lists']=$this->car_model->lists();
		
		$this->data['body']=$this->load->view($this->data['template'].'/pages/car/list',$data,true);//main content area
		//echo "<pre>";print_r($data);
		$this->load->view($this->data['template'].'/index',$this->data);
	}
	public function add()
	{	
		
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('model', 'Model', 'required');
                $this->form_validation->set_rules('reg', 'Registration', 'required');
				$this->form_validation->set_rules('color', 'Color', 'required');
				
				
				if (!$this->form_validation->run() == FALSE)
                {
						$data=array('name'=>$this->input->post('name', TRUE),
									'model'=>$this->input->post('model', TRUE),
									'reg'=>$this->input->post('reg', TRUE),
									'color'=>$this->input->post('color', TRUE),
									'category_id'=>$this->input->post('category', TRUE)
									);
									
					    $this->car_model->insert($data);
						$this->session->set_flashdata('msg', 'Car has been added');// flash msg 
						redirect('car', 'refresh');
				}
				
		 }
		
		
		
		$this->data['categories']=$this->category_model->lists();
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		$this->data['left_nav']=$this->load->view($this->data['template'].'/includes/left-nav',array(),true);
		$this->data['top_nav']=$this->load->view($this->data['template'].'/includes/top-nav',array(),true);
		$this->data['body']=$this->load->view($this->data['template'].'/pages/car/add',$this->data,true);//main content area
		
		$this->load->view($this->data['template'].'/index',$this->data);
	}
public function delete($id)
	{	
		
		
		$this->data['car']=$this->car_model->fetch(array('id'=>$id));
		if(isset($this->data['car']->id)){
		$this->car_model->delete(array('id'=>$id));
			$this->session->set_flashdata('msg', 'Car has been Delete');// flash msg 
		}else{
			$this->session->set_flashdata('msg', 'Car not listed');// flash msg
		}
		redirect('car', 'refresh');		
		
		
		
		
		
	}
	
		public function edit($id)
	{	
		
		
		$this->data['car']=$this->car_model->fetch(array('id'=>$id));	
		//echo "<pre>";print_r($this->data['car']);exit;
		
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('model', 'Model', 'required');
                $this->form_validation->set_rules('reg', 'Registration', 'required');
				$this->form_validation->set_rules('color', 'Color', 'required');
				
				
				if (!$this->form_validation->run() == FALSE)
                {
						$data=array('name'=>$this->input->post('name', TRUE),
									'model'=>$this->input->post('model', TRUE),
									'reg'=>$this->input->post('reg', TRUE),
									'color'=>$this->input->post('color', TRUE),
									'category_id'=>$this->input->post('category', TRUE)
									);
									
					    $this->car_model->update($data,array('id'=>$id));
						$this->session->set_flashdata('msg', 'Car has been updated');// flash msg 
						redirect('car', 'refresh');
				}
				
		 }
		
		
		$this->data['categories']=$this->category_model->lists();
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		$this->data['left_nav']=$this->load->view($this->data['template'].'/includes/left-nav',array(),true);
		$this->data['top_nav']=$this->load->view($this->data['template'].'/includes/top-nav',array(),true);
		$this->data['body']=$this->load->view($this->data['template'].'/pages/car/edit',$this->data,true);//main content area
		//echo "<pre>";print_r($this->data);
		$this->load->view($this->data['template'].'/index',$this->data);
	}
	

		
	
	
	
        

	
}
