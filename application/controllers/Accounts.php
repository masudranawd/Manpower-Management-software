<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Expenses_model');
		$this->load->model('User_model');
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			
			redirect('User/'); 
		} 
	}

	public function index()
	{
		$this->CustomerPayment();
	}


//Customer payment ui
	public function DateWais(){
		$data = array();

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllPayDate'] = $this->Accounts_model->Get_data_method('tb_pay_date');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		
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
			'Main File' => $this->load->view('template/accounts/date_waise.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	public function PayDateSearch(){
		$data = array();
		$data['id'] = $this->input->post('id');
			/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_pay_date';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] =$this->input->post('id'); 
		$data['PayDate'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllPaymentData'] = $this->Accounts_model->Get_data_list_method('tb_payment');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'id' => $this->input->post('id'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['AllPaymentDatal'] =  $this->Accounts_model->Get_data_pay_by_search_key_model('tb_pay_date',$sdata);
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/asset.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/cash_in.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

//Customer payment ui
	public function CAOPayment($id){
		$data = array();
		$data['id'] = $id;
			/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_pay_date';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = $id; 
		$data['PayDate'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllPaymentData'] = $this->Accounts_model->Get_data_list_method('tb_payment');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/asset.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/payment.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//Cash In payment ui
	public function CashInayment($id){
		$data = array();
		$data['id'] = $id;
			/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_pay_date';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = $id; 
		$data['PayDate'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllPaymentData'] = $this->Accounts_model->Get_data_list_method('tb_payment');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/asset.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/cash_in.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


//Cash Out payment ui
	public function CashOutayment($id){
		$data = array();
		$data['id'] = $id;
			/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_pay_date';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = $id; 
		$data['PayDate'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		$data['AllEmployeeData'] = $this->Setting_model->Get_data_method('tb_employ');
		$data['AllPaymentData'] = $this->Accounts_model->Get_data_list_method('tb_payment');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/asset.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/cash_out.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end




















// customer payment report 
	public function CustomerPaymentReport(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		$data['Voucherdata'] = $this->Accounts_model->Get_data_singleData_id('tb_payment',$data);
		
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
			'Main File' => $this->load->view('template/accounts/customer_payment-report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

// Cash Report
	public function CashReport(){
		$data = array();
		//file link

		$data['AllPayDate'] = $this->Accounts_model->Get_data_method('tb_pay_date');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/cash_report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

// Daily Cash In And Cash Out  Report 
	public function DailyCashInAndOurReport(){
		$data = array();

		$sdata=array(
			'payment_date' => $this->input->post('payment_date'), 
			);		
		$data['DailyCashData'] =  $this->Accounts_model->Get_data_Daily_CashIN_OUT_search_key_model('tb_payment',$sdata);

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
			'Main File' => $this->load->view('template/accounts/daily_cash_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}


// Daily Expense Report 
	public function DailyCashSearch(){
		$data = array();

		$sdata=array(
			'payment_date' => date("m/d/Y", strtotime($this->input->post('payment_date'))),
			'type' => $this->input->post('type'), 
			'payment_type' => $this->input->post('payment_type'),
			);		
		$data['DailyCashData'] =  $this->Accounts_model->Get_data_Daily_cahs_search_key_model('tb_payment',$sdata);

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
			'Main File' => $this->load->view('template/accounts/daily_cash_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

	public function weeklymonthCahsSearch(){
		$data = array();

		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		$sdata=array(
			'fromdate' 	=>  date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' 	=>  date("m/d/Y", strtotime($this->input->post('todate'))), 
			);		
		
		$data['MonthWeekCasheData'] =  $this->Accounts_model->weeklymonthCahsSearch('tb_payment',$sdata);

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
			'Main File' => $this->load->view('template/accounts/w_d_cash_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

/*	public function weeklymonthCahsSearch(){
		$data = array();

		$sdata=array(
			'fromdate' 	=> $this->input->post('fromdate'), 
			'todate' 	=> $this->input->post('todate'), 
			);		
		
		$data['MonthWeekCasheData'] =  $this->Accounts_model->weeklymonthCahsSearch('tb_payment',$sdata);

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*	
		
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/accounts/w_d_cash_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}



//===================================================================================|	
/*function add*/

	public function AddNewPayDate(){
		$data = array();
		$table = 'tb_pay_date';
		$data['pay_date'] = $this->input->post('pay_date');
		$data['date_id'] = date("md", strtotime($this->input->post('pay_date')));

		 $check = $this->Accounts_model->CheckPayDateNoData($data['pay_date']);
		    if($check == false){
				$id = $this->Customer_model->Insert_id_data_moele($table,$data);
				$mdata['sms'] = "<b style='color:green;'> Successfuly Save !</b>";
				$this->session->set_flashdata($mdata);
				redirect('Accounts/CashInayment/'.$id);
			}else{

		    $mdata['sms'] = "<b style='color:red;'> <strong> This Date Is Already Been Taken .Please Use Another One Date!</strong> !</b>";
			$this->session->set_flashdata($mdata);
			redirect('DateWais');
			}
	}


// insert New payment method

	public function AddNewCashInPaymentData(){
		$data = array();
		$table = 'tb_payment';
		$data['pay_id'] 	= $this->input->post('pay_id');
		$id = $this->input->post('pay_id');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['for_payment']	= $this->input->post('for_payment');
		$data['method']	 		= $this->input->post('method');
		$data['payment'] 		= $this->input->post('payment');
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['bank_name'] 	    = $this->input->post('bank_name');
		$data['bank_recepit_n'] = $this->input->post('bank_recepit_n');
		$data['bkash_n'] 	    = $this->input->post('bkash_n');
		$data['rocket_n']       =$this->input->post('rocket_n');
		$data['nogod_n']        =$this->input->post('nogod_n');
		$data['branch_name']    =$this->input->post('branch_name');
		$data['method_details'] = $this->input->post('method_details');
		$data['other_c_details'] = $this->input->post('other_c_details');
		
		$data['type'] 	        = $this->input->post('type');
		$data['payment_type']	= 'Deposit';
		$data['remark']			= $this->input->post('remark');
		$data['money_recipt']	= $this->input->post('money_recipt');
		$data['created_pay_date'] = date("m-d-Y", strtotime($this->input->post('payment_date')));

		if (empty($data['payment_type']) OR empty($data['payment']) OR empty($data['money_recipt']) ) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('Accounts/CashInayment/'.$id);
		}else{
		    
            $check = $this->Accounts_model->CheckPaymentDataNoData($data['money_recipt']);
		    if($check == false){
		        
			$this->Customer_model->insert_data_model($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);
		    }else{
		         $mdata['sms'] = "<b style='color:red;'> <strong> This Data Is Already Been Taken .Please Use Another One Data</strong> !</b>";
		         $this->session->set_flashdata($mdata);
		    }
			redirect('Accounts/CashInayment/'.$id);
			

		}
	}



	public function AddNewCashOutPayment(){
		$data = array();
		$table = 'tb_payment';
		$data['pay_id'] 	= $this->input->post('pay_id');
		$id = $this->input->post('pay_id');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['for_payment']	= $this->input->post('for_payment');
		$data['method']	 		= $this->input->post('method');
		$data['expense_payment']= $this->input->post('expense_payment');
		$data['payment_date'] 	= $this->input->post('payment_date');
		
		$data['bank_name'] 	    = $this->input->post('bank_name');
		$data['bank_recepit_n'] = $this->input->post('bank_recepit_n');
		$data['bkash_n'] 	    = $this->input->post('bkash_n');
		$data['rocket_n']       =$this->input->post('rocket_n');
		$data['nogod_n']        =$this->input->post('nogod_n');
		$data['branch_name']    =$this->input->post('branch_name');
		$data['method_details'] = $this->input->post('method_details');
		$data['other_c_details'] = $this->input->post('other_c_details');
		
		$data['payment_type']	= 'Expense';
		$data['type']			= $this->input->post('type');
		$data['remark']			= $this->input->post('remark');
		$data['voucher_no']	    = $this->input->post('voucher_no');
		$data['employ_id']	    = $this->input->post('employ_id');
		
		$data['created_pay_date'] = date("m-d-Y", strtotime($this->input->post('payment_date')));

		if (empty($data['payment_type']) OR empty($data['expense_payment']) OR empty($data['voucher_no']) ) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('Accounts/CashOutayment/'.$id);
		}else{
		    
         $check = $this->Accounts_model->CheckPaymentBankDataNoData($data['voucher_no']);
		    if($check == false){
		        
			$this->Customer_model->insert_data_model($table,$data);

	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$mdata['sms'] = "<b style='color:green;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);
			
		    }else{
		         $mdata['sms'] = "<b style='color:red;'> <strong> This Data Is Already Been Taken .Please Use Another One Data</strong> !</b>";
		         $this->session->set_flashdata($mdata);
		    }
			redirect('Accounts/CashOutayment/'.$id);
			

		}
	}


	public function RemoveCustomerpayment($id ,$pay_id){
		$data = array();
		$table = 'tb_payment';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$data['pay_id'] = $pay_id;
		$this->Setting_model->Get_remove_data_method($table,$data);

      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Customer Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Accounts/CAOPayment/'.$data['pay_id']);
	}


	public function RemoveCashInpayment($id ,$pay_id){
		$data = array();
		$table = 'tb_payment';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$data['pay_id'] = $pay_id;
		$this->Setting_model->Get_remove_data_method($table,$data);

      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Customer Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Accounts/CashInayment/'.$data['pay_id']);
	}

	public function RemoveCashOutpayment($id ,$pay_id){
		$data = array();
		$table = 'tb_payment';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$data['pay_id'] = $pay_id;
		$this->Setting_model->Get_remove_data_method($table,$data);

      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Customer Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Accounts/CashOutayment/'.$data['pay_id']);
	}

}//end Accounts Controller