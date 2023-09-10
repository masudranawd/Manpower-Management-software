<?php 
	Class Ticket_model extends CI_Model{

	public function insert_data_model($table,$data){
		$this->db->insert($table,$data);
	}

	public function Insert_id_data_moele($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}	

    /*serial  Data Check */
 	public function TicketNumberCheck($ticket_number){

 		$this->db->where('ticket_number',$ticket_number );  
           $query = $this->db->get("tb_ticket"); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }


/****************************************************************************
*Daily Expense SEARCH MODEL METHOD..
*/		
		public function Get_data_Daily_report_by_search_key_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
 
			$this->db->where('created_at', $data['created_at']);

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


		public function Get_dataWeekly_Month_Date_search_key_model($table,$data){

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


		public function Get_Flight_report_model($table,$data){
			$this->db->select('*'); 
			$this->db->from($table); 
			if(!empty($data['fromdate'])){
				$this->db->where('flight_date >=', $data['fromdate']);
				$this->db->where('flight_date <=', $data['todate']);
			}			
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}

	public function TicketPermission($table,$data){
		$this->db->set('status',$data['status']);
		$this->db->set('permission',$data['permission']);
		$this->db->where($data['match_col'],$data['match_by']);		//var_dump($data);die();
		$this->db->update($table);
	}
	
	public function Booking_ticket_update_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('agent_id',$data['agent_id']);
		//$this->db->set('vendor_id',$data['vendor_id']);
		$this->db->set('customer_id',$data['customer_id']);
		//$this->db->set('pass_dolar',$data['pass_dolar']);
		$this->db->set('pnr_code',$data['pnr_code']);
		$this->db->set('issue_date',$data['issue_date']);
		$this->db->set('flight_date',$data['flight_date']);
		$this->db->set('carrier',$data['carrier']);
		$this->db->set('ticket_number',$data['ticket_number']);
		$this->db->set('sector',$data['sector']);
		$this->db->set('air_lince',$data['air_lince']);
		$this->db->set('gross_price',$data['gross_price']);
		$this->db->set('base_fare',$data['base_fare']);
		$this->db->set('tax',$data['tax']);
		$this->db->set('comision',$data['comision']);
		$this->db->set('issue_reissue',$data['issue_reissue']);
		$this->db->set('remark',$data['remark']);
		$this->db->set('refund',$data['refund']);
		$this->db->set('void',$data['void']);
		$this->db->set('p_name',$data['p_name']);
		$this->db->set('passport',$data['passport']);
		$this->db->set('reissue',$data['reissue']);
		$this->db->set('created_at',$data['created_at']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
		}


	public function Processing_update_model($table,$data){
		$this->db->set('id',$data['id']);
		$this->db->set('agent_id',$data['agent_id']);
		$this->db->set('vendor_id',$data['vendor_id']);
		$this->db->set('customer_id',$data['customer_id']);
		$this->db->set('bill_amount',$data['bill_amount']);
		$this->db->set('agent_bill',$data['agent_bill']);
		$this->db->set('remark',$data['remark']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
		
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


}
