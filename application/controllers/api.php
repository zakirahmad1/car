<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);	
 
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;


class Api extends RestController
{
       public function __construct() {
               parent::__construct();
               $this->load->model('userapi_model');
       }    
       public function user_get(){
           $r = $this->userapi_model->read();
           $this->response($r); 
       }
       public function user_put(){
           $id = $this->uri->segment(3);
           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );
            $r = $this->userapi_model->update($id,$data);
               $this->response($r); 
       }
       public function user_post(){
           $data = array('name' => $this->input->post('name', TRUE),//xss filter
           'email' => $this->input->post('email', TRUE) //xss filter
           
           );
		   $this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				
				
				if ($this->form_validation->run() == FALSE)
                {
					$this->response(validation_errors()); 
				}
		   
		  
		  $check=$this->userapi_model-> check_email($this->input->post('email', TRUE));
		  if($check!==true){
			return $this->response($check);
		  }
		  
		   
		   
           $r = $this->userapi_model->insert($data);
           $this->response($r); 
       }
       public function user_delete(){
           $id = $this->uri->segment(3);
           $r = $this->userapi_model->delete($id);
           $this->response($r); 
       }
    
}
