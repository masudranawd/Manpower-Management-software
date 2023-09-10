<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Expenses_model');
		$this->load->model('User_model');
		$this->load->model('Account_model');
		$this->load->library('pdf');
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			
			redirect('User/'); 
		} 
	}

//Payment 

	public function PaymentDeposit(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['MonyRecpit'] = $this->Accounts_model->Get_data_singleData_id('tb_account',$data);

		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		//$data['lastDate'] = $this->Accounts_model->Get_data_lastdate('tb_account',$data);
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
			'Main File' => $this->load->view('template/account/add_deposit.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


	//All payment 
	public function paylist(){

		$data = array();

		$data['allpaylist'] =  $this->Account_model->Get_ACdata_method('tb_account');
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
			'Main File' => $this->load->view('template/account/all_pay_list.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//Receive Edit 
	public function ReceiveEdit($id){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
	    /*----------------invoice data------------------*/	
		$ReData = array();	
		$Retable = 'tb_account';
		$ReData['match_col'] = 'id';
		$ReData['match_by'] = $id; 
		$data['ReceiveData'] = $this->Setting_model->Get_Date_ById_method($Retable,$ReData);



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
			'Main File' => $this->load->view('template/account/receive_edit.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


//Cost 
	public function Cost(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['MonyRecpit'] = $this->Accounts_model->Get_data_singleData_id('tb_account',$data);

		$data['AllExpensesCat'] = $this->Setting_model->Get_data_method('tb_expenses_category');
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
			'Main File' => $this->load->view('template/account/add_cost.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


	//All Cost list 
	public function AllCost(){

		$data = array();

		$data['allpaylist'] =  $this->Customer_model->Get_data_method('tb_account');
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
			'Main File' => $this->load->view('template/account/all_cost_list.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//Expense Edit 
	public function ExpenseEdit($id){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');

		$data['AllExpensesCat'] = $this->Setting_model->Get_data_method('tb_expenses_category');

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
	    /*----------------invoice data------------------*/	
		$ReData = array();	
		$Retable = 'tb_account';
		$ReData['match_col'] = 'id';
		$ReData['match_by'] = $id; 
		$data['ExpenseData'] = $this->Setting_model->Get_Date_ById_method($Retable,$ReData);
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
			'Main File' => $this->load->view('template/account/expense_edit.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end



	//pdf Invoice
	public function Invoice($id){

		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['AllPaymentData'] = $this->Accounts_model->Get_data_method('tb_payment');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');

		$data['AllExpensesCat'] = $this->Setting_model->Get_data_method('tb_expenses_category');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		
		/*----------------invoice data------------------*/	
		$InData = array();	
		$Intable = 'tb_account';
		$InData['match_col'] = 'id';
		$InData['match_by'] = $id; 
		$data['InvoiceData'] = $this->Setting_model->Get_Date_ById_method($Intable,$InData);



//Agent Data

		$data['AgentData']=$this->Customer_model->AgentNameById($data['InvoiceData']->agent_id);
		if($data['AgentData'] == !null){
			$data['AgentName'] = $data['AgentData']->agent_name; 
			$data['AgentID'] = $data['AgentData']->agent_id; 
		}else{
			$data['AgentName'] = '';
			$data['AgentID'] = '';
		}

		$data['expense_cat_name'] = $this->Account_model->GetDataByExpenseCatMethod($data['InvoiceData']->expense_id);

//reciver_catgory

		$data['reciver_cat_name']=$this->Account_model->GetDataReciverPayMethod($data['InvoiceData']->cat_id);
		if($data['reciver_cat_name'] == !null){
			$data['ReceiveName'] = $data['reciver_cat_name']->name; 
		}else{
			$data['ReceiveName'] = '';
		}

		$data['expense_cat_name'] = $this->Account_model->GetDataByExpenseCatMethod($data['InvoiceData']->expense_id);


//expense_catgory
		if($data['expense_cat_name'] == !null){
			$data['ExpenseName'] = $data['expense_cat_name']->expenses_cat_name; 
		}else{
			$data['ExpenseName'] = '';
		}

		$data['payment_method_name'] = $this->Account_model->GetDataByPayMethod($data['InvoiceData']->payment_method_id);
		/*----------------invoice data------------------*/


    function convert_number($number) 
    {
        if (($number < 0) || ($number > 999999999)) 
        {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 100000);
        // Lac (giga)
        $number -= $giga * 100000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) 
        {
            $result .= convert_number($giga) .  " Lac";
        }
        if ($kilo) 
        {
            $result .= (empty($result) ? "" : " ") .convert_number($kilo) . " Thousand";
        }
        if ($hecto) 
        {
            $result .= (empty($result) ? "" : " ") .convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) 
            {
                $result .= " and ";
            }
            if ($deca < 2) 
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) 
                {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) 
        {
            $result = "zero";
        }
        return $result;
    }
	if($data['InvoiceData']->pay_amount == !null){
	$data['Amountword'] = convert_number($data['InvoiceData']->pay_amount);
		}else{
	$data['Amountword'] = convert_number($data['InvoiceData']->cost_amount);
		}

/*number word convert*/

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Main File' => $this->load->view('template/account/Invoice.php',$data)
		);
		$this->load->view('index',$data);
	}//end



/*function*/

	public function AddPay(){

		$data = array();
		$table = 'tb_account';
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['serial_no'] 	= $this->input->post('serial_no');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['payment_method_id']	= $this->input->post('payment_method_id');
		$data['cat_id']	 		= $this->input->post('cat_id');
		$data['pay_amount'] 	= $this->input->post('pay_amount');
		$data['remark'] 	= $this->input->post('remark');

		 $check = $this->Account_model->AccountSerialnoCheckNoData($data['serial_no']);
		// var_dump($check);die();
		     if($check == false){

		if (empty($data['payment_date']) OR empty($data['payment_method_id']) OR empty($data['pay_amount']) OR empty('cat_id')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('deposit');
		}else{
		    
			$id = $this->Account_model->Insert_id_data_model($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/Invoice/'.$id);
		    }

		}else{
		             
		       $mdata['smg'] = "<b style='color:red;'> <strong> This Money Recipt Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);

			redirect('deposit');
		  }
			
		}


/*Receive Pay Edit*/
	public function ReceivePayEdit(){

		$data = array();
		$table = 'tb_account';
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['id'] 	= $this->input->post('id');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['payment_method_id']	= $this->input->post('payment_method_id');
		$data['cat_id']	 		= $this->input->post('cat_id');
		$data['pay_amount'] 	= $this->input->post('pay_amount');
		$data['remark'] 	= $this->input->post('remark');

		if (empty($data['payment_date']) OR empty($data['payment_method_id']) OR empty($data['pay_amount']) OR empty('cat_id')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('deposit');
		}else{
		    
			 $this->Account_model->ReceivePayEdit($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/Invoice/'.$data['id'] );
		    }

	}



/* Remove Function */
	public function PayRemove($id){
		$data = array();
		$table = 'tb_account';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('paylist');
	}
	

	public function AddCost(){

		$data = array();
		$table = 'tb_account';
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['serial_no'] 	= $this->input->post('cost_serial_no');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['payment_method_id']	= $this->input->post('payment_method_id');
		$data['expense_id']	 		= $this->input->post('expense_id');
		$data['cost_amount'] 		= $this->input->post('cost_amount');
		$data['remark'] 	= $this->input->post('remark');
		//var_dump($data);die();

		 $check = $this->Account_model->AccountSerialnoCheckNoData($data['serial_no']);
		// var_dump($check);die();
		     if($check == false){

		if (empty($data['payment_date']) OR empty($data['payment_method_id']) OR empty($data['cost_amount']) OR empty($data['expense_id']) ) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('Cost');
		}else{

		    $id = $this->Account_model->Insert_id_data_model($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/Invoice/'.$id);

		    } 
			 }else{
		             
		       $mdata['smg'] = "<b style='color:red;'> <strong> This Money Recipt Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);

			redirect('Cost');
		  }
			

		}


	public function ExpensePayEdit(){

		$data = array();
		$table = 'tb_account';
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['id'] 	        = $this->input->post('id');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['payment_method_id']	= $this->input->post('payment_method_id');
		$data['expense_id']	 		= $this->input->post('expense_id');
		$data['cost_amount'] 	= $this->input->post('cost_amount');
		$data['remark'] 	= $this->input->post('remark');

		if (empty($data['payment_date']) OR empty($data['payment_method_id']) OR empty($data['cost_amount']) OR empty('expense_id')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('AllCost');
		}else{
		    
			 $this->Account_model->ExpensePayEdit($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/Invoice/'.$data['id'] );
		    }

	}


/* Remove Function */

	public function CostRemove($id){
		$data = array();
		$table = 'tb_account';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('AllCost');
	}
	




/*Report section */

// Cash Report
	public function Report(){
		$data = array();
		//file link
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');

		$data['AllExpensesCat'] = $this->Setting_model->Get_data_method('tb_expenses_category');
		
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
			'Main File' => $this->load->view('template/account/report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

// Daily Cash In And Cash Out  Report 
	public function CashReport(){
		$data = array();

		$payment_date = $this->input->post('payment_date');
		$previousdate = date("m/d/Y", strtotime ('-1 day' , strtotime ($payment_date)));
		
		$sdata=array(
			'payment_date' => $this->input->post('payment_date'), 
			'prev_date' => $previousdate, 
			);		
			
		$data['daycashData'] =  $this->Account_model->Get_data_cash_report_search_key_model('tb_account',$sdata);
		$data['dayBossReceiveData'] =  $this->Account_model->Get_data_cash_report_search_key_model('tb_boss_ac',$sdata);
    	$data['PrevCashBalance'] = $this->Account_model->Get_data_Prevcash_report_search_key_model('tb_account',$sdata);
		//var_dump($data['PrevCashBalance']);
		$data['PrevBossBalance'] = $this->Account_model->Get_data_Prevcash_report_search_key_model('tb_boss_ac',$sdata);
		
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
			'Main File' => $this->load->view('template/account/cash_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

//Weekly Monthly Cash Report
	public function weeklymonthcashReport(){
		$data = array();

		$sdata=array(
			'fromdate' 	=>  date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' 	=>  date("m/d/Y", strtotime($this->input->post('todate'))), 
			);		
		
		$data['WeeklymonthlyReportlist'] =  $this->Account_model->weeklymonthlycashReportData('tb_account',$sdata);
		$data['dayBossReceiveData'] =  $this->Account_model->weeklymonthlycashReportData('tb_boss_ac',$sdata);

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
			'Main File' => $this->load->view('template/account/weekly_monthly_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}



	//payment Method Report
	public function PaymentMethodReport(){
		$data = array();
		$sdata=array(
			'fromdate' 	=>  $this->input->post('fromdate'), 
			'todate' 	=>  $this->input->post('todate'), 
			'payment_method_id' =>  $this->input->post('payment_method_id'), 
			);		
		
		$data['PaymentMethodReportlist'] =  $this->Account_model->PaymentMethodReportData('tb_account',$sdata);

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
			'Main File' => $this->load->view('template/account/pay_method_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	

	//payment Receive Category Report
	public function PaymentReceiveCategoryReport(){
		$data = array();
		$sdata=array(
			'fromdate' 	=>  $this->input->post('fromdate'), 
			'todate' 	=>  $this->input->post('todate'), 
			'cat_id' =>  $this->input->post('cat_id'), 
			);		
		
		$data['PaymentReceiveCatReportlist'] =  $this->Account_model->PaymentReceiveCatReportData('tb_account',$sdata);

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
			'Main File' => $this->load->view('template/account/pay_receive_cat_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	

	//payment Receive Category Report
	public function PaymentExpenseCategoryReport(){
		$data = array();
		$sdata=array(
			'fromdate' 	=>  $this->input->post('fromdate'), 
			'todate' 	=>  $this->input->post('todate'), 
			'expense_id' =>  $this->input->post('expense_id'), 
			);		
		
		$data['PaymentExpenseCatReportlist'] =  $this->Account_model->PaymentExpenseCatReportData('tb_account',$sdata);

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
			'Main File' => $this->load->view('template/account/pay_expense_cat_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
/*dolar Payment*/

	public function DolarPayment(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['MonyRecpit'] = $this->Accounts_model->Get_data_singleData_id('tb_account',$data);

		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		//$data['lastDate'] = $this->Accounts_model->Get_data_lastdate('tb_account',$data);
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
			'Main File' => $this->load->view('template/dolar/add_dolar_pay.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	public function DolarPayList(){
		$data = array();

		$data['AlldolarPayList'] =  $this->Customer_model->Get_data_method('tb_dolar_pay');

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
			'Main File' => $this->load->view('template/dolar/dolar_pay_list.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//Receive Edit 
	public function DolarPayEdit($id){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
	    /*----------------invoice data------------------*/	
		$dolarData = array();	
		$dolartable = 'tb_dolar_pay';
		$dolarData['match_col'] = 'id';
		$dolarData['match_by'] = $id; 
		$data['dolarData'] = $this->Setting_model->Get_Date_ById_method($dolartable,$dolarData);


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
			'Main File' => $this->load->view('template/dolar/dolar_pay_edit.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end



//Add New Pay Dolar Funcation
	public function AddNewPayDolar(){

		$data = array();
		$table = 'tb_dolar_pay';
		$data['pay_date'] 	= $this->input->post('pay_date');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['amount'] 	= $this->input->post('amount');
		$data['remark'] 	= $this->input->post('remark');

		if (empty($data['agent_id']) OR empty($data['customer_id']) OR empty($data['amount']) OR empty('pay_date')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount, Money Recipt</b>";
			$this->session->set_flashdata($mdata);
			redirect('DolarPayment');
		}else{
		    
			 $this->Setting_model->insert_data_model($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:green;font-size:14px;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/DolarPayment/');
		    }

		}


/*Receive Pay Edit*/
	public function EditPayDolar(){

		$data = array();
		$table = 'tb_dolar_pay';
		$data['id'] 	= $this->input->post('id');
		$data['pay_date'] 	= $this->input->post('pay_date');
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['agent_id']	 	= $this->input->post('agent_id');
		$data['amount'] 	= $this->input->post('amount');
		$data['remark'] 	= $this->input->post('remark');

		if (empty($data['agent_id']) OR empty($data['customer_id']) OR empty($data['amount']) OR empty('pay_date')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount</b>";
			$this->session->set_flashdata($mdata);
			redirect('DolarPayment');
		}else{
		    
			 $this->Account_model->DolarPaymentEdit($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);

			  redirect('Account/DolarPayEdit/'.$data['id'] );
		    }

	}



/* Remove Function */
	public function DolarPayRemove($id){
		$data = array();
		$table = 'tb_dolar_pay';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Dolar Remove  &mdash; </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('DolarPayList');
	}
	

	//payment Receive Category Report
	public function DolarPayReport(){
		$data = array();
		$sdata=array(
			'fromdate' 	=>  $this->input->post('fromdate'), 
			'todate' 	=>  $this->input->post('todate'), 
			);		
		
		$data['dolarPaymentReportlist'] =  $this->Account_model->dolarpaymentreportData('tb_dolar_pay',$sdata);

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
			'Main File' => $this->load->view('template/dolar/dolar_pay_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
/*dolar Payment*/




//Summary Report
	public function SummaryReport(){
		$data = array();

		$sdata=array(
			'fromdate' 	=>  date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' 	=>  date("m/d/Y", strtotime($this->input->post('todate'))), 
			);		
		
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['WeeklymonthlyReportlist'] =  $this->Account_model->weeklymonthlycashReportData('tb_account',$sdata);
		$data['dayBossReceiveData'] =  $this->Account_model->weeklymonthlycashReportData('tb_boss_ac',$sdata);

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
			'Main File' => $this->load->view('template/account/short_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}


    


//Boss Receive 

	public function BossReceive(){
		$data = array();

		$data['AllBossReciveList'] =  $this->Setting_model->Get_data_method('tb_boss_ac');;

		$data['AllCashInCatData'] = $this->Accounts_model->Get_data_method('tb_cashin_out_cat');
		//$data['lastDate'] = $this->Accounts_model->Get_data_lastdate('tb_account',$data);
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
			'Main File' => $this->load->view('template/account/boss_receive.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end





//Add New Pay Dolar Funcation
	public function BossReceiveAdd(){

		$data = array();
		$table = 'tb_boss_ac';
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['amount'] 	= $this->input->post('amount');
		$data['remark'] 	= $this->input->post('remark');

		if (empty($data['amount']) OR empty('payment_date')) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Receive, Amount, </b>";
			$this->session->set_flashdata($mdata);
			redirect('BossReceive');
		}else{
		    
			 $id = $this->Account_model->Insert_id_data_model($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Customer Payment By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
                /*activity details*/

			$mdata['sms'] = "<b style='color:green;font-size:14px;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);
            redirect('Account/bossInvoice/'.$id);
            
		    }
		}


/*Receive Pay Edit*/
	public function BossAcEdit(){

		$data = array();
		$table = 'tb_boss_ac';
		$data['id'] 	= $this->input->post('id');
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['amount'] 	= $this->input->post('amount');
		$data['remark'] 	= $this->input->post('remark');
		
		if (empty($data['payment_date']) OR empty($data['amount'])) {
			$mdata['sms'] = "<b style='color:red;'> amount</b>";
			$this->session->set_flashdata($mdata);
			redirect('BossReceive');
		}else{
		    
			 $this->Account_model->ReceiveAmountEdit($table,$data);

        	/*activity Details*/
        		$ATable = 'tb_activity';
        		$AData = array();
        		$AData['activity_details'] = '<div class="alert alert-success"> Success :)Boss Receive Edit  By &mdash; '.$this->session->fullname.'</div>';
        		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
            /*activity details*/

			$mdata['sms'] = "<b style='color:orange;'> Successfuly Update !</b>";
			$this->session->set_flashdata($mdata);

			  
            redirect('Account/bossInvoice/'.$data['id']);
		}

	}



/* Remove Function */
	public function BossAcRemove($id){
		$data = array();
		$table = 'tb_boss_ac';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Boss Receive Amount By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('BossReceive');
	}
	







	//pdf Invoice
	public function bossInvoice($id){

		$data = array();
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		
		/*----------------invoice data------------------*/	
		$InData = array();	
		$Intable = 'tb_boss_ac';
		$InData['match_col'] = 'id';
		$InData['match_by'] = $id; 
		$data['InvoiceData'] = $this->Setting_model->Get_Date_ById_method($Intable,$InData);



    function convert_number($number) 
    {
        if (($number < 0) || ($number > 999999999)) 
        {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 100000);
        // Lac (giga)
        $number -= $giga * 100000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) 
        {
            $result .= convert_number($giga) .  " Lac";
        }
        if ($kilo) 
        {
            $result .= (empty($result) ? "" : " ") .convert_number($kilo) . " Thousand";
        }
        if ($hecto) 
        {
            $result .= (empty($result) ? "" : " ") .convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) 
            {
                $result .= " and ";
            }
            if ($deca < 2) 
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) 
                {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) 
        {
            $result = "zero";
        }
        return $result;
    }
	if($data['InvoiceData']->amount == !null){
	$data['Amountword'] = convert_number($data['InvoiceData']->amount);
		}else{
	$data['Amountword'] = convert_number($data['InvoiceData']->amount);
		}

/*number word convert*/

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Main File' => $this->load->view('template/account/boss_invoice.php',$data)
		);
		$this->load->view('index',$data);
	}//end







//Summary Report
	public function BossReceiveReport(){
		$data = array();

		$sdata=array(
			'fromdate' 	=>  date("m/d/Y", strtotime($this->input->post('fromdate'))), 
			'todate' 	=>  date("m/d/Y", strtotime($this->input->post('todate'))), 
			);		
		
		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
		$data['dayBossReceiveData'] =  $this->Account_model->weeklymonthlycashReportData('tb_boss_ac',$sdata);

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
			'Main File' => $this->load->view('template/account/boss_receive_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}














}//End Account Controller
