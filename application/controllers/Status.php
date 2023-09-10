<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('User_model');
		$this->load->model('Status_model');
		
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			
			redirect('User/'); 
		} 
	}

	public function index()
	{
		$this->NewCustomerStatus();
	}



	//Add Medical Status ui Mehthod
	public function CustomerStatusList($id){
		$data = array();


		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		/*----------------setting------------------*/	
		$csData = array();	
		$cstable = 'tb_customer';
		$csData['match_col'] = 'permission';
		$csData['match_by'] = $id; 
		$data['ALlCustomerStatusList'] = $this->Setting_model->Get_Date_ByIdCustomer_status_method($cstable,$csData);
		/*----------------setting------------------*/	
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));


		
		/*----------------setting------------------*/
		$data['StatusDataID'] =$id;

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
			'Main File' => $this->load->view('template/Status/Customer_status.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//Add Medical Status ui Mehthod
	public function NewCustomerStatus(){
		$data = array();

		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
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
			'Main File' => $this->load->view('template/Status/new_customer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//weeklyMonthly customer completed  
	public function weeklymonthCompletedSearch(){
		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$sdata=array(
			'fromdate' => $this->input->post('fromdate'), 
			'todate' => $this->input->post('todate'), 
			);		
		$data['AllCompletedCustomer'] =  $this->Status_model->Get_data_by_search_key_model('tb_customer',$sdata);
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
			'Main File' => $this->load->view('template/Status/completed_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);

	}
//


	//All Agent ui Mehthod
	public function StatusReport(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');

		$sdata=array(
			'status_id' => $this->input->post('status_id'), 
			'fromdate' => date("Y-m-d", strtotime($this->input->post('fromdate'))), 
			'todate' => date("Y-m-d", strtotime($this->input->post('todate'))), 
			);		
		//var_dump($sdata);
		$data['AllStatusList'] =  $this->Status_model->Get_data_Date_search_key_model('tb_customer_status',$sdata);
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
			'Main File' => $this->load->view('template/Status/status_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
//Function

/*Customer Status Update*/

public function CustomerStatusUpdate($id){


		$Stable = 'tb_customer';
		/*----------------------------------------------------------*/
		$Sdata = array();
		$Sdata['match_col'] = 'id';
		$Sdata['match_by'] = $id; 
		$Sdata['delivery_date'] = $this->input->post('date');
		$Sdata['permission'] = $this->input->post('customer_status');

		$data = array();
		$table='tb_customer_status';
		$data['customer_id'] = $this->input->post('customer_id');
		$data['customer_status'] = $this->input->post('customer_status');
		$data['date'] = $this->input->post('date');
		$data['remark'] = $this->input->post('remark');

		$customer_id = $data['customer_id'];
		$customer_status = $data['customer_status'] ;

		    $check = $this->Status_model->CheckStatusCheckNoData($customer_id,$customer_status );
		     if($check == false){
		if (empty($data['customer_id']) OR empty($data['customer_status']) OR empty($data['date']) ) {
			$mdata['smg'] = "<b style='color:red;'> Faild ! Please Fil up date </b>";
		}else{
			$this->Customer_model->insert_data_model($table,$data);
			$this->Status_model->Update_premission_model($Stable,$Sdata);

			$mdata['smg'] = '<b style="color:green;"> Successfuly Save !'.$data['customer_status'].'</b>';
		}
		}else{
		             
		           $mdata['smg'] = "<b style='color:red;'> <strong> This Status Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);
		  }

			$this->session->set_flashdata($mdata);
			redirect('Customer/customerPanel');

}


public function CustomerStatusUpdateByPage($id){


		$Stable = 'tb_customer';
		/*----------------------------------------------------------*/
		$Sdata = array();
		$Sdata['match_col'] = 'id';
		$Sdata['match_by'] = $id; 
		$Sdata['delivery_date'] = $this->input->post('date');
		$Sdata['permission'] = $this->input->post('customer_status');

		$data = array();
		$table='tb_customer_status';
		$data['customer_id'] = $this->input->post('customer_id');
		$data['customer_status'] = $this->input->post('customer_status');
		$data['date'] = $this->input->post('date');
		$data['remark'] = $this->input->post('remark');
		$Status_c_id = $this->input->post('Status_c_id');

		$customer_id = $data['customer_id'];
		$customer_status = $data['customer_status'] ;

		    $check = $this->Status_model->CheckStatusCheckNoData($customer_id,$customer_status );
		     if($check == false){
		if (empty($data['customer_id']) OR empty($data['customer_status']) OR empty($data['date']) ) {
			$mdata['smg'] = "<b style='color:red;'> Faild ! Please Fil up date </b>";
		}else{
			$this->Customer_model->insert_data_model($table,$data);
			$this->Status_model->Update_premission_model($Stable,$Sdata);

			$mdata['smg'] = '<b style="color:green;"> Successfuly Save !'.$data['customer_status'].'</b>';
		}
		}else{
		             
		           $mdata['smg'] = "<b style='color:red;'> <strong> This Status Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);
		  }

			$this->session->set_flashdata($mdata);
			redirect('Status/CustomerStatusList/'.$Status_c_id);

}



public function NewCustomerStatusUpdateByPage($id){


		$Stable = 'tb_customer';
		/*----------------------------------------------------------*/
		$Sdata = array();
		$Sdata['match_col'] = 'id';
		$Sdata['match_by'] = $id; 
		$Sdata['delivery_date'] = $this->input->post('date');
		$Sdata['permission'] = $this->input->post('customer_status');

		$data = array();
		$table='tb_customer_status';
		$data['customer_id'] = $this->input->post('customer_id');
		$data['customer_status'] = $this->input->post('customer_status');
		$data['date'] = $this->input->post('date');
		$data['remark'] = $this->input->post('remark');
		$Status_c_id = $this->input->post('Status_c_id');

		$customer_id = $data['customer_id'];
		$customer_status = $data['customer_status'] ;

		    $check = $this->Status_model->CheckStatusCheckNoData($customer_id,$customer_status );
		     if($check == false){
		if (empty($data['customer_id']) OR empty($data['customer_status']) OR empty($data['date']) ) {
			$mdata['smg'] = "<b style='color:red;'> Faild ! Please Fil up date </b>";
		}else{
			$this->Customer_model->insert_data_model($table,$data);
			$this->Status_model->Update_premission_model($Stable,$Sdata);

			$mdata['smg'] = '<b style="color:green;"> Successfuly Save !'.$data['customer_status'].'</b>';
		}
		}else{
		             
		           $mdata['smg'] = "<b style='color:red;'> <strong> This Status Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);
		  }

			$this->session->set_flashdata($mdata);
			redirect('Status');

}


}


