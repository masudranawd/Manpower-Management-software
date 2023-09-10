<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Expenses_model');
		$this->load->model('User_model');
		$this->load->library('Zend');
		$this->load->library('pdf');
	
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			redirect('User/'); 
		} 
		
	}

	public function index(){
		$this->AddCustomer();
	}

	public function AddCustomer(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['SerialNo'] = $this->Accounts_model->Get_data_singleData_id('tb_customer');
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
			'Main File' => $this->load->view('template/customer/add_customer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


	public function CustomerAttachFile(){
		$data = array();
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
			'Main File' => $this->load->view('template/customer/attach_file.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	public function CustomerAttachFileView($id){
		$data = array();

		$data['AttachfileListData'] = $this->Customer_model->attachFileShow('tb_file_attach',$id);
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
			'Main File' => $this->load->view('template/customer/attach_file_view.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//All Customer ui Method 
	public function AllCustomer(){

		$data = array();

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
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
			'Main File' => $this->load->view('template/customer/all_customer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//Customer Profile ui method 
	public function Customer_profile($id){

		$data = array();
		$table = 'tb_customer';
		$pdata = array(
			'match_col' => 'id',
			'match_by'	=>$id,
			);

		$data['Customerview'] = $this->Customer_model->GetSingleDataById('tb_customer',$pdata);
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
			'Main File' => $this->load->view('template/customer/customer_profile.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);

		$this->load->view('index',$data);
	}//end

//update customer details
	public function Updateprofille($id){
		$data = array();
		$table = 'tb_customer';
		$pdata = array(
			'match_col' => 'id',
			'match_by'	=>$id,
			);

		$data['CustomerDataInfo'] = $this->Customer_model->GetSingleDataById('tb_customer',$pdata);
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		//var_dump($data['Customerview']);die();
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/customer/customer_update.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);

		$this->load->view('index',$data);
	}

//Customer status panel 
	public function CustomerStatus(){
		$data = array();

		$data['AllCustomerStatusList'] =  $this->Customer_model->Get_data_method('tb_customer_status');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
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
			'Main File' => $this->load->view('template/customer/customer_status.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
	
	//customer panel 
	public function customerPanel(){
		$data = array();
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'),  
			);

		$data['CustomerAccounts'] =  $this->Setting_model->Get_data_by_search_key_model('tb_customer',$sdata);
		$data['Voucherdata'] = $this->Accounts_model->Get_data_singleData_id('tb_payment',$data);
		
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
			'Main File' => $this->load->view('template/customer/customer_panel.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//customer embassy file
	public function EmbassyFile(){
		$data = array();
		$data['AllCustomerList'] =  $this->Setting_model->Get_data_method('tb_customer');
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');

		$sdata=array(
			'serial_no' => $this->input->post('serial_no'),  
			);

		$data['CustomerDataInfo'] =  $this->Customer_model->Get_data_by_search_key_model('tb_customer',$sdata);

		$data['Voucherdata'] = $this->Accounts_model->Get_data_singleData_id('tb_payment',$data);
		
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
			'Main File' => $this->load->view('template/customer/embassy_file.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


//customer embassy file pdf ui
	public function EmbassyFilePDF($id){
		$data = array();
	
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		$pdata = array(
			'match_col' => 'id',
			'match_by'	=>$id,
			);

		$data['CustomerDataInfo'] = $this->Customer_model->GetSingleDataById('tb_customer',$pdata);
		$data['Voucherdata'] = $this->Accounts_model->Get_data_singleData_id('tb_payment',$data);
		
		
		if($data['CustomerDataInfo']->gender == 'MALE'){
		 $data['Gender'] = 'S/O' ; 
		}else{
		  $data['Gender'] = 'D/O';
		   }
$dateString=$data['CustomerDataInfo']->date_of_birth;
$data['years'] = round((time()-strtotime($dateString))/(3600*24*365.25));

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
			'Main File' => $this->load->view('template/customer/mofa_pdf.php',$data),
		);
		$this->load->view('index',$data);
	}//end

//All Customer Training Finger ui Method 
	public function CustomerTrainingFinger(){

		$data = array();

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
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
			'Main File' => $this->load->view('template/customer/all_training_finger.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//update customer details
	public function TrainingFingerEdit($id){
		$data = array();
		$table = 'tb_customer';
		$pdata = array(
			'match_col' => 'id',
			'match_by'	=>$id,
			);

		$data['CustomerDataInfo'] = $this->Customer_model->GetSingleDataById('tb_customer',$pdata);
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AllvisaCategory'] = $this->Setting_model->Get_data_method('tb_visa_category');
		$data['Allvisatypes'] = $this->Setting_model->Get_data_method('tb_visa_type');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		//var_dump($data['Customerview']);die();
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/customer/training_finger_edit.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);

		$this->load->view('index',$data);
	}

//customer Training Finger file pdf ui
	public function CustomerTrainingFingerprint($id){
		$data = array();
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		$pdata = array(
			'match_col' => 'id',
			'match_by'	=>$id,
			);

		$data['CustomerDataInfo'] = $this->Customer_model->GetSingleDataById('tb_customer',$pdata);
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
			'Main File' => $this->load->view('template/customer/training_finger_print.php',$data),
		);
		$this->load->view('index',$data);
	}//end

	//Customer function method start 

	public function AddNewCustomer(){
		$cdata = array();
		$table = 'tb_customer';
		$cdata['entry_date'] 		= $this->input->post('entry_date');
		$cdata['fullname'] 			= $this->input->post('fullname');
		$cdata['gender'] 			= $this->input->post('gender');
    	$cdata['place_of_birth'] 	= $this->input->post('place_of_birth');
		$cdata['religion'] 		    = $this->input->post('religion');
		$cdata['marital_status'] 	= $this->input->post('marital_status');
		$cdata['passport_no'] 		= $this->input->post('passport_no');
		$cdata['visa_no'] 			= $this->input->post('visa_no');
		$cdata['id_no'] 			= $this->input->post('id_no');
		$cdata['kapil_no'] 			= $this->input->post('kapil_no');
		$cdata['mobile_no'] 		= $this->input->post('mobile_no');
		$cdata['reference_no']		= $this->input->post('reference_no');
		$cdata['serial_no'] 		= $this->input->post('serial_no');
		$serial_no = $cdata['serial_no'] ;
		$cdata['visa_category'] 	= $this->input->post('visa_category');
		$cdata['visa_type'] 		= $this->input->post('visa_type');
		$cdata['agent_name'] 		= $this->input->post('agent_name');
		$cdata['reference_name'] 	= $this->input->post('reference_name');
		$cdata['note'] 	            = $this->input->post('note');
	    $cdata['rate']				= $this->input->post('rate');
	    $cdata['ticket_price']				= $this->input->post('ticket_price');
		if (empty($cdata['entry_date']) OR empty($cdata['fullname']) OR empty($cdata['serial_no']) ) {
		    $mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry data , Name ,  Serial No</b>";
	    	$this->session->set_flashdata($mdata);
			redirect('Customer');
		}else{
		    
		        $check = $this->Customer_model->CheckSerialNoData($serial_no);
		         if($check == false){
				$new_name                   	= $_FILES["customer_image"]['name'];
        		$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/customer/';
				$config['remove_spaces']		= FALSE;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100000;
                $config['max_width']            = 102400;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);
                $cdata['customer_image'] = $new_name;


                if (! $this->upload->do_upload('customer_image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    //$this->load->view('upload_form', $error);
                }
                else
                { 
                 	$data = array('upload_data' => $this->upload->data());
                }

	        /*activity Details*/
			$ATable = 'tb_activity';
			$AData = array();
			$AData['activity_details'] = '<div class="alert alert-success"> Success :)New Customer Add By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial No &mdash;'.$cdata['serial_no'].' </div>';
			$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
	        /*activity details*/

			$id = $this->Customer_model->Insert_id_data_moele($table,$cdata);
			
			$mdata['sms'] = "<b style='color:green;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);
				redirect('Customer/Customer_profile/'.$id);
		         }else{
		    $mdata['sms'] = "<b style='color:red;'> <strong> This Serial N Number Is Already Been Taken .Please Use Another One!</strong> !</b>";
			$this->session->set_flashdata($mdata);
		         }
			redirect('Customer');
		}//else
	}//end

//Customer Update 


	//Customer function method start 

	public function UpdateCustomerprofile(){
		$cdata = array();
		$table = 'tb_customer';
		$cdata['id'] 	        	= $this->input->post('id');
		$cdata['entry_date'] 		= $this->input->post('entry_date');
		$cdata['fullname'] 			= $this->input->post('fullname');
		$cdata['fullname_ban'] 		= $this->input->post('fullname_ban');
		$cdata['profession'] 		= $this->input->post('profession');
		$cdata['profession_arabic'] = $this->input->post('profession_arabic');
		$cdata['gender'] 			= $this->input->post('gender');
		$cdata['father_name'] 		= $this->input->post('father_name');
		$cdata['mother_name'] 		= $this->input->post('mother_name');
		$cdata['D_of_passport_issue']= $this->input->post('D_of_passport_issue');
		$cdata['D_passport_expiry'] = $this->input->post('D_passport_expiry');
		$cdata['date_of_birth'] 	= $this->input->post('date_of_birth');
		$cdata['place_of_birth'] 	= $this->input->post('place_of_birth');
		$cdata['place_issue'] 		= $this->input->post('place_issue');
		$cdata['qulafication'] 		= $this->input->post('qulafication');
		$cdata['previous_nationality'] = $this->input->post('previous_nationality');
		$cdata['pesent_nationality']= $this->input->post('pesent_nationality');
		$cdata['religion'] 		    = $this->input->post('religion');
		$cdata['marital_status'] 	= $this->input->post('marital_status');
		$cdata['kofil_name_ar'] 	= $this->input->post('kofil_name_ar');
		$cdata['Kofile_name_eng'] 	= $this->input->post('Kofile_name_eng');
		$cdata['passport_no'] 		= $this->input->post('passport_no');
		$cdata['visa_no'] 			= $this->input->post('visa_no');
		$cdata['id_no'] 			= $this->input->post('id_no');
		$cdata['kapil_no'] 			= $this->input->post('kapil_no');
		$cdata['mofa_number'] 		= $this->input->post('mofa_number');
		$cdata['mobile_no'] 		= $this->input->post('mobile_no');
		$cdata['reference_no']		= $this->input->post('reference_no');
		$cdata['serial_no'] 		= $this->input->post('serial_no');
		$cdata['visa_category'] 	= $this->input->post('visa_category');
		$cdata['visa_type'] 		= $this->input->post('visa_type');
		$cdata['agent_name'] 		= $this->input->post('agent_name');
		$cdata['reference_name'] 	= $this->input->post('reference_name');
		$cdata['visa_date_arabic'] 	= $this->input->post('visa_date_arabic');
		$cdata['note'] 	            = $this->input->post('note');
		$cdata['rate'] 	            = $this->input->post('rate');
	    $cdata['ticket_price']				= $this->input->post('ticket_price');
		if (empty($cdata['id'])) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry data , Name , Id Number Serial No</b>";
			$this->session->set_flashdata($mdata);
			redirect('Customer');
		}else{
				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["customer_image"]['name'];
				if(!empty($change_image)){
				//unlink('images/agent/'.$old_image); 
				$new_name                   	= $change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/customer/';
				$config['remove_spaces']		= FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $cdata['customer_image'] = $new_name;

			    if (! $this->upload->do_upload('customer_image')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
			}

        /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Customer Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial No &mdash;'.$cdata['serial_no'].' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$this->Customer_model->update_customer_data_model($table,$cdata);
			$datas['sms'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Customer/Updateprofille/'.$cdata['id']);
		}//else
	}//end

// Customper Embassy file Edit

	public function CustomerEmbassyFileEdit(){
		$cdata = array();
		$table = 'tb_customer';
		$cdata['id'] 		= $this->input->post('id');
		$cdata['fullname'] 			= $this->input->post('fullname');
		$cdata['fullname_ban'] 		= $this->input->post('fullname_ban');
		$cdata['profession'] 		= $this->input->post('profession');
		$cdata['profession_arabic'] = $this->input->post('profession_arabic');
		$cdata['gender'] 			= $this->input->post('gender');
		$cdata['father_name'] 		= $this->input->post('father_name');
		$cdata['mother_name'] 		= $this->input->post('mother_name');
		$cdata['D_of_passport_issue']= $this->input->post('D_of_passport_issue');
		$cdata['D_passport_expiry'] = $this->input->post('D_passport_expiry');
		$cdata['date_of_birth'] 	= $this->input->post('date_of_birth');
		$cdata['place_of_birth'] 	= $this->input->post('place_of_birth');
		$cdata['place_issue'] 		= $this->input->post('place_issue');
		$cdata['qulafication'] 		= $this->input->post('qulafication');
		$cdata['previous_nationality'] 	= $this->input->post('previous_nationality');
		$cdata['pesent_nationality'] 	= $this->input->post('pesent_nationality');
		$cdata['religion'] 			= $this->input->post('religion');
		$cdata['marital_status'] 	= $this->input->post('marital_status');
		$cdata['kofil_name_ar'] 	= $this->input->post('kofil_name_ar');
		$cdata['Kofile_name_eng'] 	= $this->input->post('Kofile_name_eng');
		$cdata['passport_no'] 		= $this->input->post('passport_no');
		$cdata['visa_no'] 			= $this->input->post('visa_no');
		$cdata['id_no'] 			= $this->input->post('id_no');
		$cdata['kapil_no'] 			= $this->input->post('kapil_no');
		$cdata['mofa_number'] 		= $this->input->post('mofa_number');
		$cdata['mobile_no'] 		= $this->input->post('mobile_no');
		$cdata['visa_date_arabic'] 	= $this->input->post('visa_date_arabic');
		$cdata['musaneed'] 	        = $this->input->post('musaneed');
		$cdata['qty'] 	= '1';

		$this->Customer_model->update_customer_file_data_model($table,$cdata);
          $check = $this->Customer_model->CheckEmbassyIDData($cdata['id']);
		         if($check == false){
		             $data = array();
		             $etable ='tb_embassy';
		             $data['customer_id'] = $this->input->post('id');
		             $data['created_at'] = date('m/d/Y');
		             $this->Setting_model->insert_data_model($etable,$data);
		         }

        /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Customer Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$datas['sms'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Customer/EmbassyFilePDF/'.$cdata['id']);
		
	}//end

	public function trainingFingerEditC(){
		$cdata = array();
		$table = 'tb_customer';
		$cdata['id'] 				= $this->input->post('id');
		$cdata['fullname'] 			= $this->input->post('fullname');
		$cdata['profession'] 		= $this->input->post('profession');
		$cdata['gender'] 			= $this->input->post('gender');
		$cdata['father_name'] 		= $this->input->post('father_name');
		$cdata['mother_name'] 		= $this->input->post('mother_name');
		$cdata['spouse_name'] 		= $this->input->post('spouse_name');
		$cdata['D_of_passport_issue']= $this->input->post('D_of_passport_issue');
		$cdata['date_of_birth'] 	= $this->input->post('date_of_birth');
		$cdata['place_of_birth'] 	= $this->input->post('place_of_birth');
		$cdata['pesent_nationality'] 	= $this->input->post('pesent_nationality');
		$cdata['religion'] 			= $this->input->post('religion');
		$cdata['marital_status'] 	= $this->input->post('marital_status');
		$cdata['Kofile_name_eng'] 	= $this->input->post('Kofile_name_eng');
		$cdata['passport_no'] 		= $this->input->post('passport_no');
	
		$cdata['mobile_no'] 		= $this->input->post('mobile_no');
		$cdata['division'] 			= $this->input->post('division');
		$cdata['thana'] 			= $this->input->post('thana');
		$cdata['word_union'] 		= $this->input->post('word_union');
		$cdata['postoffice'] 		= $this->input->post('postoffice');
		$cdata['village'] 			= $this->input->post('village');
		$cdata['para'] 				= $this->input->post('para');
        /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Training Finger  Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span>  </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$this->Customer_model->update_customerTraining_finger_data_model($table,$cdata);
			$datas['sms'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Customer/CustomerTrainingFingerprint/'.$cdata['id']);
		
	}//end

// Customper status add
	public function AddCustomerStatus(){
		$data = array();
		$table='tb_customer_status';
		$data['customer_id'] = $this->input->post('customer_id');
		$data['customer_status'] = $this->input->post('customer_status');
		$data['date'] = date('d/m/Y' );
		$SerialNo = $this->input->post('serial_no');

		if (empty($data['customer_id']) OR empty($data['customer_status']) OR empty($data['date']) ) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! Please Fil up Customer status and date </b>";
			$this->session->set_flashdata($mdata);
			redirect('Customer/CustomerStatus');
		}else{
			$this->Customer_model->insert_data_model($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-info"> Success :) Customer Status Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial &mdash;'.$SerialNo.'&mdash;'.$data['customer_status'].' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$mdata['smgdu'] = '<b style="color:green;"> Successfuly Save !'.$data['customer_status'].'</b>';
			$this->session->set_flashdata($mdata);
			redirect('Customer/CustomerStatus');
		}//else
	}

	public function RemoveCustomer($id){
		$data = array();
		$table = 'tb_customer';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('AllCustomer');
	}
	
	public function RemoveCustomerAttachFile($id){
		$data = array();
		$table = 'tb_file_attach';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('CustomerAttachFileView/'.$id);
	}

	public function RemoveStatusCustomer($id){
		$data = array();
		$table = 'tb_customer_status';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Customer Status Remove By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer id &mdash;'.$id.' </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('CustomerStatus');
	}

	/*ProcessingCompleteCustomer*/
	public function ProcessingCompleteCustomer($id){
		$table = 'tb_customer';
		/*----------------------------------------------------------*/
		$data = array();
		$data['match_col'] = 'id';
		$data['match_by'] = $id; 
		$data['permission'] = 1;
		$this->User_model->Update_premission_model($table,$data);
		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-info"> Success :) Processing All Completed Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial &mdash; </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$mdata['smgdu'] = '<b style="color:green;"> Successfuly Save !</b>';
		$this->session->set_flashdata($mdata);
        redirect('CustomerStatus');
	}

	/*ProcessingCompleteCustomer*/
	public function ProcessingALlCompleteCustomer($id){
		$table = 'tb_customer';
		/*----------------------------------------------------------*/
		$data = array();
		$data['match_col'] = 'id';
		$data['match_by'] = $id; 
		$data['permission'] = 1;
		$this->User_model->Update_premission_model($table,$data);
		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-info"> Success :) Processing All Completed Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial &mdash; </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$mdata['smgdu'] = '<b style="color:green;"> Successfuly Save !</b>';
		$this->session->set_flashdata($mdata);
        redirect('AllCustomer');
	}

	/*ProcessingRunningCustomer*/
	public function ProcessingRunningCustomer($id){
		$table = 'tb_customer';
		/*----------------------------------------------------------*/
		$data = array();
		$data['match_col'] = 'id';
		$data['match_by'] = $id; 
		$data['permission'] = 0;
		$this->User_model->Update_premission_model($table,$data);
		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-info"> Success :) Processing All Completed Update By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> Customer Serial &mdash; </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$mdata['smgdu'] = '<b style="color:green;"> Successfuly Save !</b>';
		$this->session->set_flashdata($mdata);
        redirect('AllCustomer');
	}

public function AddNewFileAttach(){

		$cdata = array();
		$table = 'tb_file_attach';
		$cdata['customer_id'] 		= $this->input->post('customer_id');
		$cdata['title'] 		= $this->input->post('title');
		if (empty($cdata['customer_id'])) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Select Customer </b>";
			$this->session->set_flashdata($mdata);
			redirect('Customer/CustomerAttachFile');
		}else{
				$new_name                   	= time().$_FILES["file_attach"]['name'];
        		$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/File/';
				$config['remove_spaces']		= FALSE;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100000;
                $config['max_width']            = 102400;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);
                $cdata['file_attach'] = $new_name;

                if ( ! $this->upload->do_upload('file_attach'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    //$this->load->view('upload_form', $error);
                }
                else
                { 
                 	$data = array('upload_data' => $this->upload->data());
                }

			}

	        /*activity Details*/
			$ATable = 'tb_activity';
			$AData = array();
			$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Customer File Attach By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span>div>';
			$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
	        /*activity details*/

			$this->Customer_model->insert_data_model($table,$cdata);
			$datas['sms'] ="<b style='color:green;'>Successfuly File Attach !</b>";
			$this->session->set_flashdata($datas);
			redirect('Customer/CustomerAttachFile/');
		}//else



public function StatusSearchByID(){
		$data = array();
		$status_id = $this->input->post('status_id');

		redirect('Status/CustomerStatusList/'.$status_id);
}



//Embassy File 



//All Customer Training Finger ui Method 
	public function EmbassyReport(){

		$data = array();

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['AllEmbassyReadyList'] =  $this->Customer_model->Get_data_method('tb_embassy');
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
			'Main File' => $this->load->view('template/customer/embassy_report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


    public function EmbassyReportpdf(){

		$data = array();

		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
			/*----------------------------------------------------------*/		
		$data['fromdate'] = $this->input->post('fromdate'); 
		$data['todate'] = date("m/d/Y", strtotime($this->input->post('todate'))); 	
		$data['arabic_date'] = $this->input->post('arabic_date'); 	
	//	var_dump($data['fromdate'] );die();
		$table = 'tb_embassy';			
		$data['EmbassyFileList'] = $this->Customer_model->Get_data_by_search_Embassy_model($table,$data);
		
		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		//file link
		$data = array(
			'Main File' => $this->load->view('template/customer/embassy_reportpdf.php',$data),
		);
		$this->load->view('index',$data);
	}//end
	
		public function ReturnEmabassyDateRemove($id){
		$data = array();
		$table = 'tb_embassy';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('EmbassyReport');
	}
	
	

	    
    public function ReturnEmabassyDate(){
		$cdata = array();
		$table = 'tb_embassy';
		
		$cdata['customer_id'] = $this->input->post('customer_id');
		$cdata['created_at']  = date("m/d/Y");
	    $this->Customer_model->insert_data_model($table,$cdata);
	    
		$id		 = $this->input->post('id');
		$cdata['match_by'] 	= $id;
		$cdata['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$cdata);
		
		$datas['sms'] ="<b style='color:green;'>Successfuly Return !</b>";
		$this->session->set_flashdata($datas);
		redirect('Customer/EmbassyReport/');
        
    }
    
    
    
public function StatusUpdateCustomer(){

		/*----------------------------------------------------------*/
 		$Stable = 'tb_customer';
 		$Sdata = array();
 		$Sdata['customer_id'] = $this->input->post('customer_id');
 		$Sdata['permission'] = $this->input->post('customer_status');
 		$this->Customer_model->Update_premission_model($Stable,$Sdata);
		
		/*----------------------------------------------------------*/
		
		$data = array();
		$table='tb_customer_status';
		$data['id'] = $this->input->post('id');
		$data['customer_id'] = $this->input->post('customer_id');
		$data['customer_status'] = $this->input->post('customer_status');
		$data['date'] = $this->input->post('date');
		$data['remark'] = $this->input->post('remark');

		$this->Customer_model->update_customerStatusdata_model($table,$data);

       $mdata['smg'] = "<b style='color:Orange;'> <strong>SuccessFully Done </strong> !</b>";

		$this->session->set_flashdata($mdata);
		redirect('CustomerStatus');

}




}// end Customer controllers 
