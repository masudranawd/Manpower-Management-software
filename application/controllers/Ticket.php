<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('User_model');
		$this->load->model('Ticket_model');
		$this->load->library('pdf');
		
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			
			redirect('User/'); 
		} 
	}

	public function index()
	{
		$this->TicketBooking();
	}

	//Add Ticker bookng ui Mehthod

	public function TicketBooking(){
		$data = array();
    	$data['active'] = 'TicketBOoking';
		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/add_ticket.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
	
	
	
	//Add Processing bookng ui Mehthod
	public function Processing(){
		$data = array();
		$data['active'] = 'Processing';
		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllVendorData']  =  $this->Setting_model->Get_data_method('tb_vendor');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/Add_processing.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
	
	
	
	
// all ticket list 

	//Add Ticker bookng ui Mehthod

	public function Invoice($id,$agent_id,$customer_id){
		$data = array();

		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		//$data['AllVendorData']  =  $this->Setting_model->Get_data_method('tb_vendor');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		/*----------------setting------------------*/	
		$Data = array();	
		$table = 'tb_ticket';
		$Data['match_col'] = 'id';
		$Data['match_by'] = $id; 
		$data['ticketdata'] = $this->Setting_model->Get_Date_ById_method($table,$Data);
		/*----------------setting------------------*/	
		/*ticke net price*/
		$Gross_price = $data['ticketdata']->gross_price;
	     $Base_price = $data['ticketdata']->base_fare;
	     $tax = $data['ticketdata']->tax;
	     $comision = $data['ticketdata']->comision;
	     $ait = '.3';
	     $totalcomission = ($Base_price * $comision)/100;
	     $totalait = ($Base_price * $ait)/100;
	     //echo $totalcomission;
	    // echo '<br/>'.$totalait;

	    // $totalBase = $Base_price - $totalcomission;
	     $totalBase =  $totalcomission - $totalait ;

	     //echo '<br/>'.$totalBase.'<br/>';

	  //  $data['totalnet'] = (int)$totalBase + (int)$tax ;
	    $data['totalnet'] = (int)$Gross_price - (int)$totalBase ;

		/*----------------Agent------------------*/	
		$AData = array();	
		$Atable = 'tb_agent';
		$AData['match_col'] = 'id';
		$AData['match_by'] = $agent_id; 
		$data['AgentData'] = $this->Setting_model->Get_Date_ById_method($Atable,$AData);
	//	var_dump($data['AgentData']);die();
		/*----------------Agent------------------*/
		/*----------------Vendor------------------*/		
		$VData = array();	
		$Vtable = 'tb_customer';
		$VData['match_col'] = 'id';
		$VData['match_by'] = $customer_id; 
		$data['CustomerData'] = $this->Setting_model->Get_Date_ById_method($Vtable,$VData);
		/*----------------Vendor------------------*/
		//file link
		$data = array(
			//'Left ment' => $this->load->view('inc/left_menu.php',$data),
			//'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/invoice.php',$data),
			//'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
// all ticket list 

//Add Ticker bookng ui Mehthod
	public function TicketBookingUpdate($id){
		$data = array();

		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		//$data['AllVendorData']  =  $this->Setting_model->Get_data_method('tb_vendor');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		/*----------------setting------------------*/	
		$tData = array();	
		$ttable = 'tb_ticket';
		$tData['match_col'] = 'id';
		$tData['match_by'] = $id; 
		$data['TicketData'] = $this->Setting_model->Get_Date_ById_method($ttable,$tData);
		/*----------------setting------------------*/	

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/ticket_update.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
// all ticket list 

//Add Ticker bookng ui Mehthod
	public function FlightReport(){
		$data = array();
		
		//$data['AllVendorData']  =  $this->Setting_model->Get_data_method('tb_vendor');
		$data['AllTicketData'] =  $this->Setting_model->Get_data_method('tb_ticket');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$sdata=array( 
			'fromdate' => date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' => date("m/d/Y", strtotime($this->input->post('todate'))), 
			'created_at' => '',
			);		
		$data['AllFlightReport'] =  $this->Ticket_model->Get_Flight_report_model('tb_ticket',$sdata);
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/flight_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
// all ticket list 

	public function AllTicket(){
		$data = array();

		$data['AllTicketData'] =  $this->Setting_model->Get_data_method('tb_ticket');
		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/all_ticket.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


// all ticket list 
	public function AllProcessing(){
		$data = array();

		$data['AllTicketData'] =  $this->Setting_model->Get_data_method('tb_ticket');
		$data['AllAgentList']  =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllVendorData']  =  $this->Setting_model->Get_data_method('tb_vendor');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/all_processing.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


	//All Agent ui Mehthod
	public function TicketReport(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');

		$sdata=array(
			'agent_id' => $this->input->post('agent_id'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['AgentAccount'] =  $this->Accounts_model->Get_data_by_search_key_model('tb_agent',$sdata);
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/ticket_report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

public function DailyTickterReportSearch(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');

		$sdata=array(
			'created_at' => $this->input->post('created_at'), 
			'fromdate' => '',
			'todate' => '',
			);		
		$data['AllTicketReport'] =  $this->Ticket_model->Get_data_Daily_report_by_search_key_model('tb_ticket',$sdata);

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/ticket_report_pdf.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
	
//All Agent ui Mehthod
	public function weeklymonthTicketReportSearch(){
		$data = array();


		$sdata=array( 
			'fromdate' => date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' => date("m/d/Y", strtotime($this->input->post('todate'))), 
			'created_at' => '',
			);		
		//var_dump($sdata);
		$data['AllTicketReport'] =  $this->Ticket_model->Get_dataWeekly_Month_Date_search_key_model('tb_ticket',$sdata);
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/ticket/ticket_report_pdf.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end



	public function AddAgentBookingTicket(){
		$adata = array();
		$table ='tb_ticket';
		$adata['agent_id'] = $this->input->post('agent_id');
		$adata['p_name'] = $this->input->post('p_name');
		$adata['passport'] = $this->input->post('passport');
		$adata['customer_id'] = $this->input->post('customer_id');
		//$adata['pass_dolar'] = $this->input->post('pass_dolar');
		$adata['pnr_code'] = $this->input->post('pnr_code');
		$adata['issue_date'] = $this->input->post('issue_date');
		$adata['flight_date'] = date("m/d/Y", strtotime($this->input->post('flight_date')));
		$adata['carrier'] = $this->input->post('carrier');
		$adata['ticket_number'] = $this->input->post('ticket_number');
		$adata['sector'] = $this->input->post('sector');
		$adata['air_lince'] = $this->input->post('air_lince');
		$adata['type'] = 'Ticket Booking';		
		$adata['gross_price'] 	= $this->input->post('gross_price');

		$adata['base_fare']	= $this->input->post('base_fare');
		$adata['comision'] = $this->input->post('comision');
		$totalbase 	= ($adata['base_fare'] * $adata['comision'])/100;
		//var_dump($totalbase); die();
		$adata['tax'] 	= $this->input->post('tax');

		$adata['issue_reissue'] = $this->input->post('issue_reissue');
		$adata['remark'] 			= $this->input->post('remark');
		$adata['created_at'] = date('m/d/Y', strtotime($this->input->post('created_at')));

 		$check = $this->Ticket_model->TicketNumberCheck($adata['ticket_number']);
 			if($check == false){


// 		if (empty($adata['pnr_code'] OR empty($adata['issue_date'])OR empty($adata['flight_date']))) {
// 			$datas['smg'] = "<b style='color:red;'> Invalid !</b>";
// 			$this->session->set_flashdata($datas);
// 			redirect('Ticket');
// 		}else{
		    
    /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Add New Ticket By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Ticket_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
    /*activity details*/
    
			$id = $this->Ticket_model->Insert_id_data_moele($table,$adata);
			$datas['smg'] ="<b style='color:green;'>Successfuly Save !</b>";
			$this->session->set_flashdata($datas);
		//	redirect('Ticket/Invoice/'.$id .'/'.$adata['agent_id'].'/'.$adata['customer_id']);
	redirect('Ticket/');
			//}
		}else{
			$datas['smg'] ="<b style='color:red;'>This Ticket all Ready Booking Done !</b>";
			$this->session->set_flashdata($datas);
			redirect('Ticket/');
		}
	}//end




public function BookingTicketUpdate(){
		$adata = array();
		$table ='tb_ticket';
		$adata['id'] 		= $this->input->post('id');
		$adata['agent_id']  = $this->input->post('agent_id');
		$adata['p_name'] = $this->input->post('p_name');
		$adata['passport'] = $this->input->post('passport');
		$adata['customer_id'] = $this->input->post('customer_id');
	//	$adata['pass_dolar']  = $this->input->post('pass_dolar');
		$adata['pnr_code'] 	  = $this->input->post('pnr_code');
		$adata['issue_date']  = $this->input->post('issue_date');
		$adata['flight_date'] = date("m/d/Y", strtotime($this->input->post('flight_date')));
		$adata['carrier'] 	  = $this->input->post('carrier');
		$adata['ticket_number'] = $this->input->post('ticket_number');
		$adata['sector'] 		= $this->input->post('sector');
		$adata['air_lince'] 	= $this->input->post('air_lince');
		$adata['gross_price'] 	= $this->input->post('gross_price');
		$adata['base_fare']	= $this->input->post('base_fare');
		$adata['comision'] 	= $this->input->post('comision');
		$adata['tax']		= $this->input->post('tax');
		$adata['issue_reissue'] = $this->input->post('issue_reissue');
		$adata['refund'] 	= $this->input->post('refund');
		$adata['void']  = $this->input->post('void');
		$adata['reissue']  = $this->input->post('reissue');
		$adata['created_at'] = date('m/d/Y', strtotime($this->input->post('created_at')));
		if ($adata['issue_reissue'] == 'Void') {
			$adata['void'] 	= $adata['void'];
		}else{
			$adata['void'] 	= '';
		}
		$this->Ticket_model->Booking_ticket_update_model($table,$adata);
		$datas['smg'] ="<b style='color:green;'>Successfuly Save !</b>";
		$this->session->set_flashdata($datas);
		redirect('Ticket/TicketBookingUpdate/'.$adata['id']);
	}//end












public function AddTicketPayment(){
		$adata = array();
		$table ='tb_ticket';
		$adata['payment_date'] = date("m/d/Y", strtotime($this->input->post('payment_date')));
		$adata['payment_method'] = $this->input->post('payment_method');
		$adata['payment_amount'] = $this->input->post('payment_amount');
		$adata['bank_name'] = $this->input->post('bank_name');
		$adata['bkash_n'] = $this->input->post('bkash_n');
		$adata['rocket_n'] = $this->input->post('rocket_n');
		$adata['nogod_n'] = $this->input->post('nogod_n');
		$adata['account_number'] = $this->input->post('account_number');
		$adata['type'] = 'Payment';
		$adata['created_at'] = date("m/d/Y");

		if (empty($adata['payment_date']) OR empty($adata['payment_method'] OR empty($adata['payment_amount']))) {
			$datas['smsp'] = "<b style='color:red;'> Invalid !</b>";
			$this->session->set_flashdata($datas);
			redirect('Ticket');
		}else{

			$this->Setting_model->insert_data_model($table,$adata);
			$datas['smsp'] ="<b style='color:green;'>Successfuly Save !</b>";
			$this->session->set_flashdata($datas);
			redirect('Ticket');
		}
}


	public function RemoveTicket($id){
		$data = array();
		$table = 'tb_ticket';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
    /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Ticket By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
    /*activity details*/
		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('AllTicket');
	}


	public function AddNewProcesing(){
		$adata = array();
		$table ='tb_ticket';
		$adata['agent_id'] = $this->input->post('agent_id');
		$adata['vendor_id'] = $this->input->post('vendor_id');
		$adata['customer_id'] = $this->input->post('customer_id');
		$adata['type'] = 'Processing';
		$adata['bill_amount'] = $this->input->post('bill_amount');
		$adata['agent_bill'] = $this->input->post('agent_bill');
		$adata['remark'] 	= $this->input->post('remark');
		$adata['created_at'] = date('m/d/Y');
		if (empty($adata['agent_id']) OR empty($adata['vendor_id']) OR empty($adata['customer_id']) ) {
			$datas['smg'] ="<b style='color:red;'>Please Check Agent , Company And Passenger</b>";
			$this->session->set_flashdata($datas);
		}else{
			$this->Setting_model->insert_data_model($table,$adata);
			$datas['smg'] ="<b style='color:green;'>Successfuly Add Done!</b>";
			$this->session->set_flashdata($datas);
			/*activity Details*/
			$ATable = 'tb_activity';
			$AData = array();
			$AData['activity_details'] = '<div class="alert alert-success"> Success :)Add New Procesing  By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
			$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
	    /*activity details*/
		}

	    redirect('Ticket/processing');
	}//end


public function UpdateProcessing(){
		$adata = array();
		$table ='tb_ticket';
		$adata['id'] 		  = $this->input->post('id');
		$adata['agent_id']    = $this->input->post('agent_id');
		$adata['vendor_id']   = $this->input->post('vendor_id');
		$adata['customer_id'] = $this->input->post('customer_id');
		$adata['bill_amount'] = $this->input->post('bill_amount');
		$adata['agent_bill']  = $this->input->post('agent_bill');
		$adata['remark'] 	  = $this->input->post('remark');
		
		$this->Ticket_model->Processing_update_model($table,$adata);
		$datas['smg'] ="<b style='color:green;'>Successfuly Save !</b>";
		$this->session->set_flashdata($datas);
		redirect('Ticket/AllProcessing/');
	}//end



	public function RemoveProcessing($id){
		$data = array();
		$table = 'tb_ticket';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
    /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Ticket By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
    /*activity details*/
		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('AllProcessing');
	}



}


