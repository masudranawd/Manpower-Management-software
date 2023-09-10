<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		
		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Account_model');
		$this->load->model('Expenses_model');
		$this->load->model('User_model');
		$this->load->model('Status_model');
		$this->load->library('Zend');
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
		$this->Homepage();
	}

	public function Homepage(){
		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		$data['TotalCustomer'] = $this->Setting_model->CountAll('tb_customer');//total 
		$data['TotalNewCustomer'] = $this->Status_model->CountNewAll('tb_customer');//total  
		$data['TotalAgent'] = $this->Setting_model->CountAll('tb_agent');//total 
		$data['TotalUser'] = $this->Setting_model->CountAll('tb_user');//total 
		
		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		$data['allpaylist'] =  $this->Customer_model->Get_data_method('tb_account');
		
		$data['MonyRecpit'] = $this->Accounts_model->Get_data_singleData_id('tb_account',$data);
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/dashboard/dashboard.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
//Activity ui method
	public function Activity(){
		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/dashboard/activity.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
	public function ManPower(){
		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllManpowerSl'] = $this->Setting_model->Get_data_method('tb_manpower_sl');
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/manpower/ManPower.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

	public function ManPowerView(){
		$data = array();
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllManpowerSl'] = $this->Setting_model->Get_data_method('tb_manpower_sl');
		$data['TotalMP'] = $this->Setting_model->CountAll('tb_manpower');//total 
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/manpower/AllManpower.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}



	public function ManpowerSlAdd(){
		$data = array();
		$table = 'tb_manpower_sl';
		$data['manpower_sl'] = $this->input->post('manpower_sl');
		$data['date'] = date("d/m/Y", strtotime($this->input->post('date')));
		if (empty($data['manpower_sl']) OR empty($data['date'])) {
			$datas['sms'] = "<h4 style='color:red;'>enter serial No and Date  !</h4>";
        	$this->session->set_flashdata($datas);
		}else{
		$this->Setting_model->insert_data_model($table,$data);
      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :)Add  Expenses Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['sms'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
        $this->session->set_flashdata($datas);
    }
        redirect('Dashboard/ManPower');

	}



		public function ManPowerCustomer(){
		$data = array();
		$data['manpower_sl'] = $this->input->post('manpower_sl');
			$sdata=array(
			'serial_no' => $this->input->post('serial_no'),  
			);

		$data['CustomerDataInfo'] =  $this->Setting_model->Get_data_by_searchCustomer_key_model('tb_customer',$sdata);
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');
		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/manpower/manpowercustomer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

	public function ManPowerCustomerSame($manpower_sl){
		$data = array();
		$data['manpower_sl'] = $manpower_sl;

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'),  
			);

		$data['CustomerDataInfo'] =  $this->Setting_model->Get_data_by_searchCustomer_key_model('tb_customer',$sdata);

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');

		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/manpower/manpowercustomer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
// print ManPower

	public function ManPowerCustomerPrint($manpower_sl){
		$data = array();
		$data['manpower_sl'] = $manpower_sl;

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');

		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');

		/*----------------mapower customer pint------------------*/	

		$sdata=array(
			'manpower_sl' => $manpower_sl,  
			);

		$data['AllManpowerCustomerList'] =  $this->Setting_model->Get_Date_mcp_data_ById_method('tb_manpower',$sdata);

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Main File' => $this->load->view('template/manpower/MPcusomerPdf.php',$data),
		
		);
		$this->load->view('index',$data);
	}

	public function ManPowerSheetPrint($manpower_sl){
		$data = array();
		$data['manpower_sl'] = $manpower_sl;

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');

		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');

		/*----------------mapower customer pint------------------*/	
		$sdata=array(
			'manpower_sl' => $manpower_sl,  
			);

		$data['AllManpowerCustomerList'] =  $this->Setting_model->Get_Date_mcp_data_ById_method('tb_manpower',$sdata);

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Main File' => $this->load->view('template/manpower/manpowersheetprint.php',$data),
		
		);
		$this->load->view('index',$data);
	}


	public function ManPowerSheetPrinttwo($manpower_sl){
		$data = array();
		$data['manpower_sl'] = $manpower_sl;

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');

		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');

		/*----------------mapower customer pint------------------*/	
		$sdata=array(
			'manpower_sl' => $manpower_sl,  
			);

		$data['AllManpowerCustomerList'] =  $this->Setting_model->Get_Date_mcp_data_ById_method('tb_manpower',$sdata);

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_manpower_sl';
		$siteData['match_col'] = 'manpower_sl';
		$siteData['match_by'] = $manpower_sl; 
		$data['MPData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Main File' => $this->load->view('template/manpower/note_two.php',$data),
		
		);
		$this->load->view('index',$data);
	}



	public function ManPowerSheetPrintthree($manpower_sl){
		$data = array();
		$data['manpower_sl'] = $manpower_sl;

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['AllActivityData'] = $this->Setting_model->Get_data_method('tb_activity');
		$data['AllCustomerList'] = $this->Setting_model->Get_data_method('tb_customer');

		$data['AllManpowerCustomerList'] = $this->Setting_model->Get_data_method('tb_manpower');

		/*----------------mapower customer pint------------------*/	
		$sdata=array(
			'manpower_sl' => $manpower_sl,  
			);

		$data['AllManpowerCustomerList'] =  $this->Setting_model->Get_Date_mcp_data_ById_method('tb_manpower',$sdata);

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_manpower_sl';
		$siteData['match_col'] = 'manpower_sl';
		$siteData['match_by'] = $manpower_sl; 
		$data['MPData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//ui link 
		$data = array(
			'Main File' => $this->load->view('template/manpower/note_three.php',$data),
		
		);
		$this->load->view('index',$data);
	}








	public function CustomerManpowerEdit(){
		$data = array();
		$table = 'tb_customer';
		$data['id'] 				= $this->input->post('id');
		$data['fullname'] 			= $this->input->post('fullname');
		$data['manpower_sl'] 		= $this->input->post('manpower_sl');
		$data['visa_no'] 			= $this->input->post('visa_no');
		$data['profession'] 		= $this->input->post('profession');
		$data['profession_arabic'] 	= $this->input->post('profession_arabic');
		$data['date_of_birth'] 		= $this->input->post('date_of_birth');
		$data['pesent_nationality']	= $this->input->post('pesent_nationality');
		$data['Kofile_name_eng'] 	= $this->input->post('Kofile_name_eng');
		$data['passport_no'] 		= $this->input->post('passport_no');
		$data['certificate_no'] 	= $this->input->post('certificate_no');
		$data['batch_no'] 			= $this->input->post('batch_no');
		$data['batch_sl'] 			= $this->input->post('batch_sl');
		$data['ttc_name'] 			= $this->input->post('ttc_name');
		$this->Customer_model->update_customerManpower_file_data_model($table,$data);
		$idata=array();
		$itable = 'tb_manpower';
		$idata['customer_id'] = $this->input->post('id');
		$idata['manpower_sl'] = $this->input->post('manpower_sl');
		$this->Setting_model->insert_data_model($itable,$idata);

			$datas['sms'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Dashboard/ManPowerCustomerSame/'.$data['manpower_sl']);
		
	}//end


     public function RemoveManPowerCustomer($id){
     	$data = array();
     	$data['manpower_sl'] = $this->input->post('manpower_sl');
		$table = 'tb_manpower';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Status Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Dashboard/ManPowerCustomerSame/'.$data['manpower_sl']);
     }

     public function RemoveManPowerSerial($manpower_sl){
     	$data = array();
		$table = 'tb_manpower';
		$data['match_by'] 	= $manpower_sl;
		$data['match_col']  = 'manpower_sl';
		$this->Setting_model->Get_remove_data_method($table,$data);


     	$sldata = array();
		$sltable = 'tb_manpower_sl';
		$sldata['match_by'] 	= $manpower_sl;
		$sldata['match_col']  = 'manpower_sl';
		$this->Setting_model->Get_remove_data_method($sltable,$sldata);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Status Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Dashboard/ManPowerView');
     }

}
