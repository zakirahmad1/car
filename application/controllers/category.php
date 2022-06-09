<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);	
class Category extends CI_Controller {
var $data=array('template'=>'template/light/admin');
	/**
	 * Template variable if you want to change the new template
	 */
	   public function __construct() {
               parent::__construct();
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
		$data['lists']=$this->category_model->lists();
		
		$this->data['body']=$this->load->view($this->data['template'].'/pages/category/list',$data,true);//main content area
		//echo "<pre>";print_r($data);
		$this->load->view($this->data['template'].'/index',$this->data);
	}
	public function add()
	{	
		
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required');
				
				
				if (!$this->form_validation->run() == FALSE)
                {
						$data=array('name'=>$this->input->post('name', TRUE),
									);
									
					    $this->category_model->insert($data);
						$this->session->set_flashdata('msg', 'category has been added');// flash msg 
						redirect('category', 'refresh');
				}
				
		 }
		
		
		
		
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		$this->data['left_nav']=$this->load->view($this->data['template'].'/includes/left-nav',array(),true);
		$this->data['top_nav']=$this->load->view($this->data['template'].'/includes/top-nav',array(),true);
		$this->data['body']=$this->load->view($this->data['template'].'/pages/category/add',array(),true);//main content area
		
		$this->load->view($this->data['template'].'/index',$this->data);
	}
public function delete($id)
	{	
		
		
		$this->data['category']=$this->category_model->fetch(array('id'=>$id));
		if(isset($this->data['category']->id)){
		$this->category_model->delete(array('id'=>$id));
			$this->session->set_flashdata('msg', 'Category has been Delete');// flash msg 
		}else{
			$this->session->set_flashdata('msg', 'Category not listed');// flash msg
		}
		redirect('category', 'refresh');		
		
		
		
		
		
	}
	
		public function edit($id)
	{	
		
		
		$this->data['category']=$this->category_model->fetch(array('id'=>$id));	
		//echo "<pre>";print_r($this->data['car']);exit;
		
		 if(isset($_POST['action']) && $_POST['action']=="add" ){
			 
				$this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required');
				
				
				
				if (!$this->form_validation->run() == FALSE)
                {
						$data=array('name'=>$this->input->post('name', TRUE),
								
									);
									
					    $this->category_model->update($data,array('id'=>$id));
						$this->session->set_flashdata('msg', 'category has been updated');// flash msg 
						redirect('category', 'refresh');
				}
				
		 }
		
		
		
		$this->data['header']=$this->load->view($this->data['template'].'/includes/header',array(),true);
		$this->data['footer']=$this->load->view($this->data['template'].'/includes/footer',array(),true);
		$this->data['left_nav']=$this->load->view($this->data['template'].'/includes/left-nav',array(),true);
		$this->data['top_nav']=$this->load->view($this->data['template'].'/includes/top-nav',array(),true);
		$this->data['body']=$this->load->view($this->data['template'].'/pages/category/edit',$this->data,true);//main content area
		//echo "<pre>";print_r($this->data);
		$this->load->view($this->data['template'].'/index',$this->data);
	}
	

		
	
	
	
        

	
}
