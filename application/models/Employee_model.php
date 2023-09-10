<?php 
	Class Employee_model extends CI_Model{
	    
// get data by single 
	public function Get_data_singleData_id($table){
			$this->db->select("*");
			$this->db->from($table);
			$this->db->limit(1);
			$this->db->order_by('id',"DESC");
			$result = $this->db->get();
			$result = $result->row();			
			return $result; 

	}

	public function update_employee_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('employ_id',$data['employ_id']);
		$this->db->set('name',$data['name']);
		$this->db->set('phone',$data['phone']);
		$this->db->set('designation',$data['designation']);
		$this->db->set('address',$data['address']);
		if(isset($data['image'])){$this->db->set('image',$data['image']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

}