<?php 
	Class Customer_model extends CI_Model{
	    
/*serial  Data Check */
 	public function CheckSerialNoData($serial_no){

 		$this->db->where('serial_no',$serial_no );  
           $query = $this->db->get("tb_customer"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
/*serial  Data Check */
 	public function CheckEmbassyIDData($id){

 		$this->db->where('customer_id',$id );  
           $query = $this->db->get("tb_embassy"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      	
      	
//insert Or Add function 
	public function insert_data_model($table,$data){
		$this->db->insert($table,$data);
	}

	public function Insert_id_data_moele($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}	

/****************************************************************************
*SERCH MODEL METHOD..
*/		
	public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('serial_no', $data['serial_no']);
			
			$result = $this->db->get();
			$result = $result->row();
			return $result;			
		}
		

// get data show model 
	public function Get_data_method($table){
		$this->db->select('*');
		$this->db->from($table);
		if($table=='tb_customer'){ $this->db->order_by('id','DESC'); }
		if($table=='tb_account'){ $this->db->order_by('id','DESC'); }
		if($table=='tb_embassy'){ $this->db->order_by('id','DESC'); }
		if($table=='tb_customer_status'){ $this->db->order_by('id','DESC'); }
		
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end

// get data show attach file 

	public function attachFileShow($table,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('customer_id',$id);
		$result = $this->db->get();
		$result = $result->result();
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

//get data by  customer id payment data 
	public function GetDatapayment($id){
			$this->db->select('*');
			$this->db->from('tb_payment');
			$this->db->where('customer_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

// get data by customer status data
	public function GetDataCustomerStatus($id){
			$this->db->select('*');
			$this->db->from('tb_customer_status');
			$this->db->where('customer_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}
/*------------------------------------------------------------------*/
		public function GetVisaCategoryById($visa_category)
		{
			$this->db->select('*');
			$this->db->from('tb_visa_category');
			$this->db->where('id',$visa_category);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}


// Customer status By id

		public function CustomerStatusbyID($customer_status){
			$this->db->select('*');
			$this->db->from('tb_status');
			$this->db->where('id',$customer_status);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}
		

// Agent Name BY Id

		public function AgentNameById($agent_id){
			$this->db->select('*');
			$this->db->from('tb_agent');
			$this->db->where('id',$agent_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}
		

// Customer Name BY Id

		public function customernamebyid($customer_id){
			$this->db->select('*');
			$this->db->from('tb_customer');
			$this->db->where('id',$customer_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}
		
// Visa Type Name BY Id

		public function VisaTypeById($visa_type){
			$this->db->select('*');
			$this->db->from('tb_visa_type');
			$this->db->where('id',$visa_type);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}

// Customer status change 
		public function Customer_Status_update_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('processing_status',$data['processing_status']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
		}

// customer data update 

		public function update_customer_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('entry_date',$data['entry_date']);
		$this->db->set('fullname',$data['fullname']);
		$this->db->set('fullname_ban',$data['fullname_ban']);
		$this->db->set('profession',$data['profession']);
		$this->db->set('profession_arabic',$data['profession_arabic']);
		$this->db->set('father_name',$data['father_name']);
		$this->db->set('mother_name',$data['mother_name']);
		$this->db->set('D_of_passport_issue',$data['D_of_passport_issue']);
		$this->db->set('D_passport_expiry',$data['D_passport_expiry']);
		$this->db->set('date_of_birth',$data['date_of_birth']);
		$this->db->set('place_of_birth',$data['place_of_birth']);
		$this->db->set('place_issue',$data['place_issue']);
		$this->db->set('qulafication',$data['qulafication']);
		$this->db->set('previous_nationality',$data['previous_nationality']);
		$this->db->set('pesent_nationality',$data['pesent_nationality']);
		$this->db->set('religion',$data['religion']);
		$this->db->set('marital_status',$data['marital_status']);
		$this->db->set('kofil_name_ar',$data['kofil_name_ar']);
		$this->db->set('Kofile_name_eng',$data['Kofile_name_eng']);
		$this->db->set('mofa_number',$data['mofa_number']);
		$this->db->set('passport_no',$data['passport_no']);
		$this->db->set('visa_no',$data['visa_no']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('id_no',$data['id_no']);
		$this->db->set('kapil_no',$data['kapil_no']);
		$this->db->set('mobile_no',$data['mobile_no']);
		$this->db->set('reference_no',$data['reference_no']);
		$this->db->set('serial_no',$data['serial_no']);
		$this->db->set('visa_category',$data['visa_category']);
		$this->db->set('visa_type',$data['visa_type']);
		$this->db->set('agent_name',$data['agent_name']);
		$this->db->set('reference_name',$data['reference_name']);
		$this->db->set('note',$data['note']);
		$this->db->set('rate',$data['rate']);
		$this->db->set('ticket_price',$data['ticket_price']);
		$this->db->set('visa_date_arabic',$data['visa_date_arabic']);
		if(isset($data['customer_image'])){$this->db->set('customer_image',$data['customer_image']);}
		$this->db->where('id',$data['id']);
		$this->db->update($table);
		}

	public function update_customer_file_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('fullname',$data['fullname']);
		$this->db->set('profession',$data['profession']);
		$this->db->set('profession_arabic',$data['profession_arabic']);
		$this->db->set('father_name',$data['father_name']);
		$this->db->set('mother_name',$data['mother_name']);
		$this->db->set('D_of_passport_issue',$data['D_of_passport_issue']);
		$this->db->set('D_passport_expiry',$data['D_passport_expiry']);
		$this->db->set('date_of_birth',$data['date_of_birth']);
		$this->db->set('place_of_birth',$data['place_of_birth']);
		$this->db->set('place_issue',$data['place_issue']);
		$this->db->set('qulafication',$data['qulafication']);
		$this->db->set('previous_nationality',$data['previous_nationality']);
		$this->db->set('pesent_nationality',$data['pesent_nationality']);
		$this->db->set('religion',$data['religion']);
		$this->db->set('marital_status',$data['marital_status']);
		$this->db->set('kofil_name_ar',$data['kofil_name_ar']);
		$this->db->set('Kofile_name_eng',$data['Kofile_name_eng']);
		$this->db->set('mofa_number',$data['mofa_number']);
		$this->db->set('passport_no',$data['passport_no']);
		$this->db->set('visa_no',$data['visa_no']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('id_no',$data['id_no']);
		$this->db->set('kapil_no',$data['kapil_no']);
		$this->db->set('mobile_no',$data['mobile_no']);
		$this->db->set('visa_date_arabic',$data['visa_date_arabic']);
		$this->db->set('qty',$data['qty']);
		$this->db->set('musaneed',$data['musaneed']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

	public function update_customerTraining_finger_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('fullname',$data['fullname']);
		$this->db->set('profession',$data['profession']);
		$this->db->set('father_name',$data['father_name']);
		$this->db->set('mother_name',$data['mother_name']);
		$this->db->set('spouse_name',$data['spouse_name']);
		$this->db->set('D_of_passport_issue',$data['D_of_passport_issue']);
		$this->db->set('date_of_birth',$data['date_of_birth']);
		$this->db->set('place_of_birth',$data['place_of_birth']);
		//$this->db->set('place_issue',$data['place_issue']);
		$this->db->set('pesent_nationality',$data['pesent_nationality']);
		$this->db->set('religion',$data['religion']);
		$this->db->set('Kofile_name_eng',$data['Kofile_name_eng']);
		$this->db->set('marital_status',$data['marital_status']);
		$this->db->set('passport_no',$data['passport_no']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('division',$data['division']);
		$this->db->set('thana',$data['thana']);
		$this->db->set('word_union',$data['word_union']);
		$this->db->set('postoffice',$data['postoffice']);
		$this->db->set('village',$data['village']);
		$this->db->set('para',$data['para']);
		$this->db->set('mobile_no',$data['mobile_no']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_Visa_Customer_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('visa_no', $data['visa_no']);
			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
		
		
		
		
		

/****************************************************************************
*SERCH MODEL METHOD..
*/		
		public function Get_data_passport_Customer_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			
			$this->db->where('passport_no', $data['passport_no']);
			
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}
		
public function update_customerManpower_file_data_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('fullname',$data['fullname']);
		$this->db->set('profession',$data['profession']);
		$this->db->set('profession_arabic',$data['profession_arabic']);
		$this->db->set('date_of_birth',$data['date_of_birth']);
		$this->db->set('Kofile_name_eng',$data['Kofile_name_eng']);
		$this->db->set('passport_no',$data['passport_no']);
		$this->db->set('visa_no',$data['visa_no']);
		$this->db->set('pesent_nationality',$data['pesent_nationality']);
		$this->db->set('certificate_no',$data['certificate_no']);
		$this->db->set('batch_no',$data['batch_no']);
		$this->db->set('batch_sl',$data['batch_sl']);
		$this->db->set('ttc_name',$data['ttc_name']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}

	public function Update_premission_model($table,$data){	
	    $this->db->set('id',$data['customer_id']);
		$this->db->set('permission',$data['permission']);
		$this->db->where('id',$data['customer_id']);
		//var_dump($data); die();
		$this->db->update($table);
	}	
	
	
	public function update_customerStatusdata_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('customer_id',$data['customer_id']);
		$this->db->set('customer_status',$data['customer_status']);
		$this->db->set('date',$data['date']);
		$this->db->set('remark',$data['remark']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}
	
		
		
//Embassy File Report 

	// Customer  Data Id
	public function CustomerDataByID($ReportData){
		$this->db->select('*');
		$this->db->from('tb_customer');
		$this->db->where('id',$ReportData);
		$result = $this->db->get();
		$result = $result->row();
		return $result;
	}		
		
	
	    /****************************************************************************
    *SERCH MODEL METHOD..
    */		
	public function Get_data_by_search_Embassy_model($table,$data){
		$this->db->select('*'); 
		$this->db->from($table); 
		
			$this->db->where('created_at >=', date("m/d/Y", strtotime($data['fromdate'])));
			$this->db->where('created_at <=', date("m/d/Y", strtotime($data['todate'])));
		

		$result = $this->db->get();
		$result = $result->result();
		return $result;			
		}	
		
			// get data by customer status data
	public function GetDataCustomerPaymentStatus($id){
			$this->db->select('*');
			$this->db->from('tb_account');
			$this->db->where('customer_id',$id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
	}

	    	
}


