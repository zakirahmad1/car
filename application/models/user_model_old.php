<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model

{

	public function read(){

       $query = $this->db->query("select * from `tbl_user`");
       return $query->result_array();

	}
	
	 function check_email($email){
		 $sql="select name from `tbl_user` where email=?";
		 $where=array('email'=>$email);
		 $row=$this->query_row($sql,$where);
		// echo "<pre>";print_r($row);exit;
		 
		 
			if(isset($row->name)){
				return "Email already exist";
			}else{
				return true;
			}
	
	}


       function query_row($sql,$where){
		$query =$this->db->query($sql, $where);
		return $query->row();		
	
	}

	

   public  function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

   public function insert($data){

       

       $this->name    = $data['name']; // please read the below note
       $this->email  = $data['email'];
	   $this->password  = $this->randomPassword();
       if($this->db->insert('tbl_user',$this))

       {    

           return 'Data is inserted successfully';

       }

         else

       {

           return "Error has occured";

       }

   }



   public function update($id,$data){

   

      $this->user_name    = $data['name']; // please read the below note

       $this->user_password  = $data['pass'];

       $this->user_type = $data['type'];

       $result = $this->db->update('tbl_user',$this,array('user_id' => $id));

       if($result)

       {

           return "Data is updated successfully";

       }

       else

       {

           return "Error has occurred";

       }

   }



   public function delete($id){

   

       $result = $this->db->query("delete from `tbl_user` where user_id = $id");

       if($result)

       {

           return "Data is deleted successfully";

       }

       else

       {

           return "Error has occurred";

       }

   }



}