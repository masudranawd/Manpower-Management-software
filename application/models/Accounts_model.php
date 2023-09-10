<?php 
	Class Accounts_model extends CI_Model{
	    
/*serial  Data Check */
 	public function CheckPayDateNoData($pay_date){

 		$this->db->where('pay_date',$pay_date );  
           $query = $this->db->get("tb_pay_date"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

/*payment   Data Check */
 	public function CheckPaymentDataNoData($money_recipt){
 		$this->db->where('money_recipt',$money_recipt);
           $query = $this->db->get("tb_payment"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

    public function CheckPaymentBankDataNoData($voucher_no){
 	$this->db->where('voucher_no',$voucher_no);
           $query = $this->db->get("tb_payment"); 
           if($query->num_rows() > null)  
           {  
                return true;  
         }  
           else  
                 return false;  
      }  
   
      
//insert Or Add function 
	public function insert_data_model($table,$data){
		$this->db->insert($table,$data);
	}

	public function Insert_id_data_moele($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}	

// get data show model 

	public function Get_data_method($table){
		$this->db->select('*');
		$this->db->from($table);
		if($table=='tb_payment'){ $this->db->order_by('id','DESC'); }	
		if($table=='tb_pay_date'){ $this->db->order_by('id','DESC'); }	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end
	
// get data show model 
	public function Get_data_list_method($table){
		$this->db->select('*');
		$this->db->from($table);	
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end

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

// remove data method

	public function Get_remove_data_method($table,$data){
		$this->db->where($data['match_col'],$data['match_by']);
		$this->db->delete($table);
	}


// Get Single data show By ID

	public function GetSingleDataById($table,$pdata){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($pdata['match_col'],$pdata['match_by']);
		$result = $this->db->get();
		$result = $result->row();
		return $result;
	}

	public function GetDatapayment($id){
			$this->db->select('*');
			$this->db->from('tb_payment');
			$this->db->where('customer_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

/*------------------------------------------------------------------*/

// Customer Invoice Data Id

		public function Customer_info_for_invoice($customer_id){
			$this->db->select('*');
			$this->db->from('tb_customer');
			$this->db->where('id',$customer_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}

// Agent Invoice Data Id
		public function Agent_info_for_invoice($agent_id){
			$this->db->select('*');
			$this->db->from('tb_agent');
			$this->db->where('id',$agent_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}


/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('agent_id', $data['agent_id']);
			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}

		public function Get_data_Daily_CashIN_OUT_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			$this->db->where('payment_date', $data['payment_date']);
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
/****************************************************************************
*Daily Expense SEARCH MODEL METHOD..
*/		
		public function Get_data_Daily_cahs_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
 
			$this->db->where('payment_date', $data['payment_date']);
			$this->db->where('type', $data['type']);
			$this->db->where('payment_type', $data['payment_type']);

			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}


		public function weeklymonthCahsSearch($table,$data){

			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('payment_date >=', $data['fromdate']);
				$this->db->where('payment_date <=', $data['todate']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}


		public function EditPayment_get_data_By_ID($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('for_payment',$data['for_payment']);
		$this->db->set('method',$data['method']);
		$this->db->set('payment',$data['payment']);
		$this->db->set('expense_payment',$data['expense_payment']);
		$this->db->set('payment_date',$data['payment_date']);
		$this->db->set('bank_name',$data['bank_name']);
		$this->db->set('bank_recepit_n',$data['bank_recepit_n']);
		$this->db->set('bkash_n',$data['bkash_n']);
		$this->db->set('rocket_n',$data['rocket_n']);
		$this->db->set('details',$data['details']);
		$this->db->set('payment_type',$data['payment_type']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
		}


/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_pay_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('id', $data['id']);
			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
		
		

// Employee  Data Id
		public function Employee_info_for_invoice($employ_id){
			$this->db->select('*');
			$this->db->from('tb_employ');
			$this->db->where('id',$employ_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}


}
