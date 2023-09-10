<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Status_model');

		$this->load->model('Account_model');
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
		$this->AddAgent();
	}

	//Add Agent ui Mehthod
	public function AddAgent(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['AgentId'] = $this->Accounts_model->Get_data_singleData_id('tb_agent');
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
			'Main File' => $this->load->view('template/agent/add_agent.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//Add Agent ui Mehthod
	public function AllAgent(){
		$data = array();

		$data['AllAgentList'] =  $this->Agent_model->Get_data_Agent_method('tb_agent');
		$data['AgentId'] = $this->Accounts_model->Get_data_singleData_id('tb_agent');
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
			'Main File' => $this->load->view('template/agent/all_agent.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//  Agent Report ui Mehthod
	public function AgentReport(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
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
			'Main File' => $this->load->view('template/agent/agent_report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//  Agent Report ui View Mehthod
	public function AgentReportView(){
		$data = array();
/*status*/
		$data['TotalNewCustomer'] = $this->Status_model->CountNewAll('tb_customer');//total 

		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
/*status*/
		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$sdata=array('agent_id' => $this->input->post('agent_id'),);	
		$data['AgentData'] =  $this->Agent_model->Get_data_by_search_key_model('tb_agent',$sdata);
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
			'Main File' => $this->load->view('template/agent/agent_report_view.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

    /*Agent Customer Status*/
	public function AgentCustomerStatusList($id,$agent_id){
		$data = array();


		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		/*----------------setting------------------*/	
		$csData = array();	
		$cstable = 'tb_customer';
		$csData['match_col'] = 'permission';
		$csData['match_by'] = $id; 
		$csData['agent_id'] = $agent_id;
		$data['ALlCustomerStatusList'] = $this->Agent_model->Get_Date_ByIdAgentCustomer_status_method($cstable,$csData);
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
			'Main File' => $this->load->view('template/agent/agent_customer_status.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


    /*Agent New Customer */
	public function agentNewCustomerList($agent_id){
		$data = array();


		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		/*----------------setting------------------*/	
		$csData = array();	
		$cstable = 'tb_customer';
		$csData['match_col'] = 'permission';
		$csData['match_by'] = '0'; 
		$csData['agent_id'] = $agent_id;
		$data['ALlCustomerStatusList'] = $this->Agent_model->Get_Date_ByIdAgentCustomer_status_method($cstable,$csData);
		/*----------------setting------------------*/	
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
			'Main File' => $this->load->view('template/agent/agent_new_customer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end



    /*Agent All Customer*/
	public function AgentAllCustomerList($agent_id){
		$data = array();


		$data['AllStatus'] =  $this->Customer_model->Get_data_method('tb_status');
		/*----------------setting------------------*/	
		$csData = array();	
		$cstable = 'tb_customer';
		$csData['match_col'] = 'agent_name';
		$csData['match_by'] = $agent_id; 
		$data['AgentALlCustomerList'] = $this->Agent_model->AgentALlCustomerDataList($cstable,$csData);
		/*----------------setting------------------*/	
		$data['AllCustomerList'] =  $this->Customer_model->Get_data_method('tb_customer');
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));


		
		/*----------------setting------------------*/
	
		$data['match_by'] = $agent_id; 

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
			'Main File' => $this->load->view('template/agent/agent_all_customer.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


// Insert Agent data method
//All Agent ui Mehthod
	public function AgentReportDateMonth(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');

		$sdata=array(
			'agent_id' => $this->input->post('agent_id'), 
			'fromdate' => $this->input->post('fromdate'), 
			'todate' => $this->input->post('todate'), 
			);		
		//var_dump($sdata);
		$data['AgentAccountList'] =  $this->Agent_model->Get_data_Date_search_key_model('tb_account',$sdata);
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
			'Main File' => $this->load->view('template/agent/agent_payment_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	public function AddNewAgent(){
		$adata = array();
		$table ='tb_agent';
		$adata['agent_id'] = $this->input->post('agent_id');
		$agent_id = $adata['agent_id'] ;
		$adata['agent_name'] = $this->input->post('agent_name');
		$adata['mobile_no'] = $this->input->post('mobile_no');
		$adata['gender'] = $this->input->post('gender');
		$adata['address'] = $this->input->post('address');
		$adata['agent_details'] = $this->input->post('agent_details');
		$adata['balance'] = $this->input->post('balance');

		if (empty($adata['agent_id']) OR empty($adata['agent_name']) OR empty($adata['mobile_no'])) {
			$datas['smg'] = "<b style='color:red;'> Invalid ! Please Check your Agent Id , Agent Name , And Contact Number</b>";
			$this->session->set_flashdata($datas);
			redirect('Agent');
		}else{
		    
		        $check = $this->Agent_model->CheckSerialNoData($agent_id);
		         if($check == false){
				$new_name                   	= $_FILES["agent_image"]['name'];
        		$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/agent/';
				$config['remove_spaces']		= FALSE;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100000;
                $config['max_width']            = 102400;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);
                $adata['agent_image'] = $new_name;


                if ( ! $this->upload->do_upload('agent_image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    //$this->load->view('upload_form', $error);
                }
                else
                { 
                 	$data = array('upload_data' => $this->upload->data());
                }

		        	$this->Setting_model->insert_data_model($table,$adata);
		         	$datas['smg'] ="<b style='color:green;'>Successfuly Save !</b>";
		        	$this->session->set_flashdata($datas);
		         }else{
		             
		           $mdata['smg'] = "<b style='color:red;'> <strong> This Serial  Number Is Already Been Taken .Please Use Another One!</strong> !</b>";
		        	$this->session->set_flashdata($mdata);
		         }
			redirect('Agent');
		}
	}//end

// Update agent info

	public function updateAgent(){
		$adata = array();
		$table ='tb_agent';
		$adata['id'] = $this->input->post('id');
		$adata['agent_id'] = $this->input->post('agent_id');
		$adata['agent_name'] = $this->input->post('agent_name');
		$adata['mobile_no'] = $this->input->post('mobile_no');
		$adata['gender'] = $this->input->post('gender');
		$adata['address'] = $this->input->post('address');
		$adata['agent_details'] = $this->input->post('agent_details');
		$adata['balance'] = $this->input->post('balance');

		if (empty($adata['id'])) {
			$datas['smg'] = "<b style='color:red;'> Invalid ! Please Check your Agent Id , Agent Name , And Contact Number</b>";
			$this->session->set_flashdata($datas);
			redirect('Agent/AllAgent');
		}else{
				
				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["agent_image"]['name'];
				if(!empty($change_image)){
				unlink('images/agent/'.$old_image); 
				$new_name                   	= $change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/agent/';
				$config['remove_spaces']		= FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $adata['agent_image'] = $new_name;

			    if (! $this->upload->do_upload('agent_image')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
			}
			$this->Agent_model->update_agent_data_model($table,$adata);
			$datas['smgdu'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Agent/AllAgent');
		}

	}//end

	public function removeAgent($id){
		$data = array();
		$table = 'tb_agent';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Agent/AllAgent');
	}


}


