<?php 
	Class Expenses_model extends CI_Model{


		public function GetExpensesCatById($expense_cat_id)
		{
			$this->db->select('*');
			$this->db->from('tb_expenses_category');
			$this->db->where('id',$expense_cat_id);
			$result = $this->db->get();
			$result = $result->row();
			return $result;
		}


		public function Get_data_method($table){
			$this->db->select('*');
			$this->db->from($table);
			if($table=='tb_expenses'){ $this->db->order_by('id','DESC'); }	
			$result = $this->db->get();
			$result = $result->result();
			return $result;

		}//end

		public function UpdateExpense_data_model($table,$data){
			$this->db->set('id',$data['id']);
			$this->db->set('payment_date',$data['payment_date']);
			$this->db->set('expense_cat_id',$data['expense_cat_id']);
			$this->db->set('details',$data['details']);
			$this->db->set('expense_payment',$data['expense_payment']);
			$this->db->where('id',$data['id']);
			$this->db->update($table);
		}
/****************************************************************************
*Daily Expense SEARCH MODEL METHOD..
*/		
		public function Get_data_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
 
			$this->db->where('expense_date', $data['expense_date']);

			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}


/****************************************************************************
*Daily Expense SEARCH Catagory MODEL METHOD..
*/		
		public function Get_data_Dayily_Expense_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
 
			$this->db->where('expense_date', $data['expense_date']);
			$this->db->where('expense_cat_id', $data['expense_cat_id']);

			$result = $this->db->get();
			$result = $result->result();
			return $result;			
		}


		public function Get_data_D_W_by_search_key_model($table,$data){

			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('created_at >=', $data['fromdate']);
				$this->db->where('created_at <=', $data['todate']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}

		
	}