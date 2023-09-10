<?php 
	Class Status_model extends CI_Model{

		/*serial  Data Check */
 	public function CheckStatusCheckNoData($customer_id, $customer_status){

 		$this->db->where('customer_id',$customer_id);  
 		$this->db->where('customer_status',$customer_status);  
           $query = $this->db->get("tb_customer_status"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

	public function Update_premission_model($table,$data){
			$this->db->set('permission',$data['permission']);
			$this->db->set('delivery_date',$data['delivery_date']);
			$this->db->where($data['match_col'],$data['match_by']);
			//var_dump($data); die();
			$this->db->update($table);
		}	


		public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('delivery_date >=', $data['fromdate']);
				$this->db->where('delivery_date <=', $data['todate']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}

	public function CountNewAll($table){
		$this->db->select(); 
		$this->db->from($table);
		$this->db->where('permission','0');
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}


/****************************************************************************
*Daily Expense SEARCH MODEL METHOD..
*/		
		public function Get_data_Date_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('customer_status', $data['status_id']);
				$this->db->where('date >=', $data['fromdate']);
				$this->db->where('date <=', $data['todate']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}

}

