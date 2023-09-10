<?php 
	Class Setting_model extends CI_Model{
//count
	public function CountAll($table){
		$this->db->select(); 
		$this->db->from($table);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}
	
	//count
	public function CustomerStatusTotal($id){
		$this->db->select(); 
		$this->db->from('tb_customer');
		$this->db->where('permission',$id);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}

	//count
	public function AgentCustomerStatusTotal($id, $agent_id){
		//var_dump($agent_id);
		$this->db->select(); 
		$this->db->from('tb_customer');
		$this->db->where('permission',$id);
		$this->db->where('agent_name',$agent_id);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}

	//count
	public function AgentTotalNewCustomer($agent_id){
		//var_dump($agent_id);
		$this->db->select(); 
		$this->db->from('tb_customer');
		$this->db->where('permission','0');
		$this->db->where('agent_name',$agent_id);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}

	//Agent Total Customer
	public function AgentTotalCustomer($id){
		//var_dump($agent_id);
		$this->db->select(); 
		$this->db->from('tb_customer');
		$this->db->where('agent_name',$id);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}
	

	//count
	public function CountSlAll($manpower_sl){
		$this->db->select(); 
		$this->db->from('tb_manpower');
		$this->db->where('manpower_sl',$manpower_sl);
		$result = $this->db->get(); 
		$result = $result->num_rows();
		return $result; 
	}
	
//insert Or Add function 
	public function insert_data_model($table,$data){
		$this->db->insert($table,$data);
	}
	

// get data show model 

	public function Get_data_method($table){
		$this->db->select('*');
		$this->db->from($table);
		if($table=='tb_activity'){ $this->db->order_by('activity_id','DESC'); }	
		if($table=='tb_agent'){ $this->db->order_by('id','DESC'); }	
		if($table=='tb_boss_ac'){ $this->db->order_by('id','DESC'); }	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end
	
// get data show model 

	public function Get_Date_ByIdCustomer_status_method($cstable, $csData){
		$this->db->select('*');
		$this->db->from($cstable);
			$this->db->where($csData['match_col'],$csData['match_by']);	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end
	

    public function Get_Date_ById_method($sitetable,$siteData){
            $this->db->select('*');
			$this->db->from($sitetable);
			$this->db->where($siteData['match_col'],$siteData['match_by']);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
    }

// remove data method

	public function Get_remove_data_method($table,$data){
		$this->db->where($data['match_col'],$data['match_by']);
		$this->db->delete($table);
	}
//update data method

	public function cat_update_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('cat_name',$data['cat_name']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);

	}
// visa update data method
	public function update_visa_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('visa_type',$data['visa_type']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

//Expenses_cat_update_data_model
	public function Expenses_cat_update_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('expenses_cat_name',$data['expenses_cat_name']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}
	
//Cash In Out update_data_model
	public function CashINOut_cat_update_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('name',$data['name']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}
	
/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('serial_no', $data['serial_no']);
			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
		
	    public function GeneralsettingUpdate($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('title',$data['title']);
		$this->db->set('name',$data['name']);
		$this->db->set('address',$data['address']);
		$this->db->set('phone',$data['phone']);
		$this->db->set('email',$data['email']);
		if(isset($data['logo'])){$this->db->set('logo',$data['logo']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	    }


	    public function GeneralsettingStemUpdate($table,$data){
		$this->db->set('id',$data['id']);
		if(isset($data['stemp_image'])){$this->db->set('stemp_image',$data['stemp_image']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	    }

	    public function GeneralsettingSignatureUpdate($table,$data){
		$this->db->set('id',$data['id']);
		if(isset($data['signature_image'])){$this->db->set('signature_image',$data['signature_image']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	    }
	    
	    
	  public function Get_Date_mcp_data_ById_method($table,$data){
			$this->db->select('*'); 
			$this->db->from($table);
			$this->db->where('manpower_sl', $data['manpower_sl']);
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
		
	public function Get_data_by_searchCustomer_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table);
			$this->db->where('serial_no', $data['serial_no']);
			$result = $this->db->get();
			$result = $result->row();
			return $result;			
		}
					
/****************************************************************************
*STATUS ACTIVE/INACTIVE MODEL METHOD... 
*/	
	public function Update_acitivity_model($table,$data){
			$this->db->set('status',$data['status']);
			$this->db->where($data['match_col'],$data['match_by']);
			$this->db->update($table);
		}
		
	 public function Payment_update($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('bank_name',$data['bank_name']);
		$this->db->set('account_number',$data['account_number']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	    }


	public function EditVoucherData($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('vou_no',$data['vou_no']);
		$this->db->set('type',$data['type']);
		$this->db->set('vou_date',$data['vou_date']);
		$this->db->set('amount',$data['amount']);
		$this->db->set('account',$data['account']);
		$this->db->set('received',$data['received']);
		$this->db->set('on_account',$data['on_account']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	    }

		
}

