<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('User_model');
		$this->load->model('Employee_model');
		
		$login_user = $this->session->userdata('user_id'); 
		if(isset($login_user)){
			$login_user; 
		}else{
			
			redirect('User/'); 
		} 
	}

	public function index()
	{
		$this->AddEmployee();
	}

	//Add Agent ui Mehthod
	public function AddEmployee(){
		$data = array();

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$data['EmployeeId'] = $this->Accounts_model->Get_data_singleData_id('tb_employ');
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
			'Main File' => $this->load->view('template/employee/add_employee.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//Add Agent ui Mehthod
	public function AllEmployee(){
		$data = array();

		$data['AllEmployList'] =  $this->Agent_model->Get_data_Agent_method('tb_employ');
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
			'Main File' => $this->load->view('template/employee/all_employee.php',$data),
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

		$data['AllAgentList'] =  $this->Setting_model->Get_data_method('tb_agent');
		$sdata=array('agent_id' => $this->input->post('agent_id'),);	
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
			'Main File' => $this->load->view('template/agent/agent_report_view.php',$data),
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
		$data['AgentAccountList'] =  $this->Agent_model->Get_data_Date_search_key_model('tb_payment',$sdata);
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

	public function AddNewEmployee(){
		$adata = array();
		$table ='tb_employ';
		$adata['employ_id'] = $this->input->post('employ_id');
		$adata['joining_date'] = $this->input->post('joining_date');
		$adata['name'] = $this->input->post('name');
		$adata['phone'] = $this->input->post('phone');
		$adata['designation'] = $this->input->post('designation');
		$adata['address'] = $this->input->post('address');
		$adata['created_at'] = date('d/m/Y');

		if (empty($adata['employ_id']) OR empty($adata['name'] OR empty($adata['phone']))) {
			$datas['smg'] = "<b style='color:red;'> Invalid ! Please Check your Id ,  Name , And Phone Number</b>";
			$this->session->set_flashdata($datas);
			redirect('Employee');
		}else{
				$new_name                   	= time().$_FILES["image"]['name'];
        		$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/employee/';
				$config['remove_spaces']		= FALSE;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100000;
                $config['max_width']            = 102400;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);
                $adata['image'] = $new_name;


                if ( ! $this->upload->do_upload('image'))
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
		         }
			redirect('Employee');
	}//end

// Update agent info

	public function updateEmployee(){
		$adata = array();
		$table ='tb_employ';
		$adata['id'] = $this->input->post('id');
		$adata['employ_id'] = $this->input->post('employ_id');
		$adata['joining_date'] = $this->input->post('joining_date');
		$adata['name'] = $this->input->post('name');
		$adata['phone'] = $this->input->post('phone');
		$adata['designation'] = $this->input->post('designation');
		$adata['address'] = $this->input->post('address');
		$adata['created_at'] = date('d/m/Y');

		if (empty($adata['id'])) {
			$datas['smg'] = "<b style='color:red;'> Invalid ! Please Check your Agent Id , Agent Name , And Contact Number</b>";
			$this->session->set_flashdata($datas);
			redirect('Employee/AllEmployee');
		}else{
				
				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["image"]['name'];
				if(!empty($change_image)){
				unlink('images/employee/'.$old_image); 
				$new_name                   	= time().$change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/employee/';
				$config['remove_spaces']		= FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $adata['image'] = $new_name;

			    if (! $this->upload->do_upload('image')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
			}
			$this->Employee_model->update_employee_data_model($table,$adata);
			$datas['smgdu'] ="<b style='color:green;'>Successfuly Updated !</b>";
			$this->session->set_flashdata($datas);
			redirect('Employee/AllEmployee');
		}

	}//end

	public function removeEmployee($id){
		$data = array();
		$table = 'tb_employ';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
		redirect('Employee/AllEmployee');
	}


}


