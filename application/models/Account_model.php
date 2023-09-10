<?php 
	Class Account_model extends CI_Model{


		/*serial  Data Check */
 	public function AccountSerialnoCheckNoData($serial_no){

 		$this->db->where('serial_no',$serial_no);   
           $query = $this->db->get("tb_account"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }



// get data show model 
	public function Get_ACdata_method($table){
		$this->db->select('*');
		$this->db->from($table);
		if($table=='tb_account'){
		    $this->db->order_by('id','DESC');
		    $this->db->group_by('id');
		}
		
		$result = $this->db->get();
		$result = $result->result();
		return $result;

	}//end
	

	public function Insert_id_data_model($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}	


// Customer Name BY Id

		public function GetDataReciverPayMethod($paylist){
			$this->db->select('*');
			$this->db->from('tb_cashin_out_cat');
			$this->db->where('id',$paylist);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}

// Customer Name BY Id

		public function GetDataByPayMethod($payment_method_id){
			$this->db->select('*');
			$this->db->from('tb_pay_method');
			$this->db->where('id',$payment_method_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}


		public function GetDataBycatMethod($cat_id){
			$this->db->select('*');
			$this->db->from('tb_cashin_out_cat');
			$this->db->where('id',$cat_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}

		public function GetDataByExpenseCatMethod($expense_id){
			$this->db->select('*');
			$this->db->from('tb_expenses_category');
			$this->db->where('id',$expense_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}




		public function Get_data_cash_report_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			$this->db->where('payment_date', $data['payment_date']);
			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}


//Receive payment Update 

		public function ReceivePayEdit($table,$data){
			$this->db->set('id',$data['id']);
			$this->db->set('payment_date',$data['payment_date']);
			$this->db->set('agent_id',$data['agent_id']);
			$this->db->set('customer_id',$data['customer_id']);
			$this->db->set('cat_id',$data['cat_id']);
			$this->db->set('payment_method_id',$data['payment_method_id']);
			$this->db->set('pay_amount',$data['pay_amount']);
			$this->db->set('remark',$data['remark']);
			$this->db->set('id',$data['id']);
			$this->db->where('id',$data['id']);
			$this->db->Update($table);
		}

		public function ExpensePayEdit($table,$data){
			$this->db->set('id',$data['id']);
			$this->db->set('payment_date',$data['payment_date']);
			$this->db->set('agent_id',$data['agent_id']);
			$this->db->set('customer_id',$data['customer_id']);
			$this->db->set('expense_id',$data['expense_id']);
			$this->db->set('payment_method_id',$data['payment_method_id']);
			$this->db->set('cost_amount',$data['cost_amount']);
			$this->db->set('remark',$data['remark']);
			$this->db->set('id',$data['id']);
			$this->db->where('id',$data['id']);
			$this->db->Update($table);
		}


		public function DolarPaymentEdit($table,$data){
			$this->db->set('id',$data['id']);
			$this->db->set('pay_date',$data['pay_date']);
			$this->db->set('agent_id',$data['agent_id']);
			$this->db->set('customer_id',$data['customer_id']);
			$this->db->set('amount',$data['amount']);
			$this->db->set('remark',$data['remark']);
			$this->db->set('id',$data['id']);
			$this->db->where('id',$data['id']);
			$this->db->Update($table);
		}


		public function ReceiveAmountEdit($table,$data){
			$this->db->set('id',$data['id']);
			$this->db->set('payment_date',$data['payment_date']);
			$this->db->set('amount',$data['amount']);
			$this->db->set('remark',$data['remark']);
			$this->db->set('id',$data['id']);
			$this->db->where('id',$data['id']);
			$this->db->Update($table);
		}



//report model start 

		//weekly monthly report acount model 
		public function weeklymonthlycashReportData($table,$data){

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




// Payment method report

		public function PaymentMethodReportData($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			$this->db->where('payment_method_id', $data['payment_method_id']);
			if(!empty($data['fromdate'])){
				$this->db->where('payment_date >=', date("m/d/Y", strtotime($data['fromdate'])));
				$this->db->where('payment_date <=', date("m/d/Y", strtotime($data['todate'])));
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}


// Receive Category report

		public function PaymentReceiveCatReportData($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			$this->db->where('cat_id', $data['cat_id']);
			if(!empty($data['fromdate'])){
				$this->db->where('payment_date >=', date("m/d/Y", strtotime($data['fromdate'])));
				$this->db->where('payment_date <=', date("m/d/Y", strtotime($data['todate'])));
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}


// Receive Category report

		public function PaymentExpenseCatReportData($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			$this->db->where('expense_id', $data['expense_id']);
			if(!empty($data['fromdate'])){
				$this->db->where('payment_date >=', date("m/d/Y", strtotime($data['fromdate'])));
				$this->db->where('payment_date <=', date("m/d/Y", strtotime($data['todate'])));
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}

// Dolar Payment Report 

		public function dolarpaymentreportData($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('pay_date >=', date("m/d/Y", strtotime($data['fromdate'])));
				$this->db->where('pay_date <=', date("m/d/Y", strtotime($data['todate'])));
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}




	// Agent Account List

		public function agentaccountlist($agent_id){
			$this->db->select('*');
			$this->db->from('tb_account');
			$this->db->where('agent_id',$agent_id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}


	// agent rate  customer list 
		public function agentcustomerlist($agent_id){
			$this->db->select('*');
			$this->db->from('tb_customer');
			$this->db->where('agent_name',$agent_id);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}


	// Payment Last Date Account list 
		public function lastdateAccountlist($payment_date){
			$this->db->select('*');
			$this->db->from('tb_account');
			$this->db->where('payment_date',$payment_date);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}

	// Payment Last Date Account list 
		public function lastdateBossAccountlist($payment_date){
			$this->db->select('*');
			$this->db->from('tb_boss_ac');
			$this->db->where('payment_date',$payment_date);
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}




		//Prev Cass report acount model 
		public function Get_data_Prevcash_report_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['payment_date'])){
				$this->db->where('payment_date >=', '01/01/2022');
				$this->db->where('payment_date <=', $data['prev_date']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}




	}