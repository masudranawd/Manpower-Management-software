<?php 
	Class Agent_model extends CI_Model{
	    
/*serial  Data Check */
 	public function CheckSerialNoData($agent_id){

 		$this->db->where('agent_id',$agent_id );  
           $query = $this->db->get("tb_agent"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
// visa update data method
	public function update_agent_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('agent_id',$data['agent_id']);
		$this->db->set('agent_name',$data['agent_name']);
		$this->db->set('mobile_no',$data['mobile_no']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('address',$data['address']);
		$this->db->set('agent_details',$data['agent_details']);
		if(isset($data['agent_image'])){$this->db->set('agent_image',$data['agent_image']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

	public function GetDataAgentpayment($id){
			$this->db->select('*');
			$this->db->from('tb_payment');
			$this->db->where('agent_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

	public function GetDataAgentpaymentExpense($id){
			$this->db->select('*');
			$this->db->from('tb_payment');
			$this->db->where('customer_id',$id);
			$this->db->where('payment_type','Expense');
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

	public function AgentALlCustomerList($id){
			$this->db->select('*');
			$this->db->from('tb_customer');
			$this->db->where('agent_name',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

	public function Countmember($id){
		$this->db->select(); 
		$this->db->from('tb_customer');
		$this->db->where('permission',0); 
		$this->db->where('agent_name',$id);
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
				$this->db->where('agent_id', $data['agent_id']);
			if(!empty($data['fromdate'])){
				$this->db->where('payment_date >=', date("m/d/Y", strtotime($data['fromdate'])));
				$this->db->where('payment_date <=', date("m/d/Y", strtotime($data['todate'])));
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}

	public function Get_data_Agent_method($table){
		$this->db->select('*');
		$this->db->from($table);	
		if($table=='tb_agent'){ $this->db->order_by('id','DESC'); }	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end

	/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('agent_id', $data['agent_id']);
			
			$result = $this->db->get();
			$result = $result->row();
			return $result;			
		}


		public function Get_Date_ByIdAgentCustomer_status_method($cstable, $csData){
		$this->db->select('*');
		$this->db->from($cstable);
		$this->db->where($csData['match_col'],$csData['match_by']);
		$this->db->where('agent_name',$csData['agent_id']);	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end

		public function AgentALlCustomerDataList($cstable, $csData){
		$this->db->select('*');
		$this->db->from($cstable);
		$this->db->where($csData['match_col'],$csData['match_by']);
		if($cstable=='tb_customer'){ $this->db->order_by('id','DESC'); }	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end

	
		public function GetDataByStatusMethod($permission){
			$this->db->select('*');
			$this->db->from('tb_status');
			$this->db->where('id',$permission);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}



	//Agent Customer Payment 

		public function GetDataByCustomerPaymentMethod($id){
			$this->db->select('*');
			$this->db->from('tb_account');
			$this->db->where('customer_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}
}
