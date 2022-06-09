<?php
Class Car_model extends CI_Model
{
	var $table="tbl_car";

	function query_row($sql,$where){
		$query =$this->db->query($sql, $where);
		return $query->row();		
	
	}
	
	function query_result($sql,$where){
		$query =$this->db->query($sql, $where);
		return $query->result();		
	
	}
	
	
	function fetch($where=array(),$like=array())
 {
   $this->db-> select('*');
   $this->db-> from($this->table);
	if(!empty($where)){
		$this->db -> where($where);
	}
	if(!empty($like)){
		
		$this->db->like($like); 
	}
   $query = $this->db->get();

   if($query->num_rows() > 0)
   {
     return $query->row();
   }
   else
   {
     return false;
   }
 }
 function lists($where=array(),$like=array(),$offset=0, $limit=null,$orderby=array())
 {
   $this->db-> select("{$this->table}.*");
   $this->db-> from($this->table);
   if(!empty($where)){
	$this->db-> where($where);
   }
   if(!empty($like)){
	$this->db-> where($like);
   }
   
    if(!empty($orderby)){
 
		foreach($orderby as $bykey=>$byvalue){
		//secho "<pre>";print_r($byvalue);exit;   
			$this->db->order_by($byvalue['name'], $byvalue['order']);
		}
   }
   if($limit!=null){
		$query = $this->db->get('',$limit, $offset);
   }else{
		$query = $this->db->get();
   }
   

   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 
function delete($where){
	$this->db->where($where);
	$this->db->delete($this->table); 
 }
 function insert($data){
	 //echo "<pre>"; print_r($data);exit;
		$this->db->insert($this->table, $data); 
		return $this->db->insert_id();
 }
 function update($data,$where){

	$this->db->where($where);
	$this->db->update($this->table, $data); 
 
 }
}
?>
