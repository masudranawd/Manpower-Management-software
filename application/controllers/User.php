<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('Setting_model');
		$this->load->model('Customer_model');
		$this->load->model('Agent_model');
		$this->load->model('Accounts_model');
		$this->load->model('Expenses_model');
		$this->load->model('User_model');
	}

	public function index()
	{
			if(isset($this->session->user_id)){ redirect('Dashboard/'); }else{ $this->Login(); 	}//login check ..
	}


	public function Login(){
		$data = array();
		/*----------------------------------------------------------*/		
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		$data['content'] = $this->load->view('template/user/login.php',$data); 
		/*---------------------------------------------------------*/
		$this->load->view('index',$data); 
	}	

	//Add user ui Mehthod
	public function AddUser(){
		$data = array();
		
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
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Main File' => $this->load->view('template/user/add_user.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end
	
	//All user ui Mehthod
	public function AllUser(){
		$data = array();
		$data['AlluserData'] = $this->Setting_model->Get_data_method('tb_user');
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
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Main File' => $this->load->view('template/user/all_user.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	//All user profile ui Mehthod
	public function userProfile(){
		$data = array();
		$data['AlluserData'] = $this->Setting_model->Get_data_method('tb_user');
		
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
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Main File' => $this->load->view('template/user/profile.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


	public function Login_From(){
		$data = array(); 
		/*---------------------------------------------------------*/
		$data['user_id'] = $this->input->post('user_id'); 
		$data['password'] = $this->input->post('password'); 
		/*---------------------------------------------------------*/

		$user_id = $data['user_id']; 
		$password = $data['password'];

		if(empty($user_id) OR empty($password)){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red;">Login Failed !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User',$sdata); 
		}else{
			$sdata = array();
			$check = $this->User_model->userLogin($data);
			if($check){
				$this->User_model->User_status_on($check->id); 
				$sdata = array(); 
				$sdata['id'] = $check->id; 
				$sdata['user_id'] = $check->user_id;  
				$sdata['email'] = $check->email; 
				$sdata['fullname'] = $check->fullname; 
				$sdata['types'] = $check->types;
				$sdata['phone'] = $check->phone; 
				$sdata['address'] = $check->address; 
				$sdata['userlogin'] = TRUE; 
				$this->session->set_userdata($sdata);//set as session... 
				/**/
				redirect('Dashboard/Homepage',$sdata);
			}else{
				$sdata = array();
				$sdata['msg'] = '<span style="color:red;">Invalid !</span>'; 
				$this->session->set_flashdata($sdata);
				redirect('User',$sdata); 
			}
		}
	}//login method end..

//Logout... 
	public function Logout(){
		$this->session->unset_userdata('userlogin',FALSE);

		$this->session->sess_destroy(); 
		redirect('User'); 
	}

/*=======================================================================================
| Add New user Method ------
*/

	public function AddNewUser(){
		$sdata=array();
		$adata = array();
		$adata['user_id'] = $this->input->post('user_id');
		$adata['fullname'] = $this->input->post('fullname');
		$adata['types'] = $this->input->post('types');
		$adata['password'] = $this->input->post('password');
		$adata['email'] = $this->input->post('email');
		$adata['phone'] = $this->input->post('phone');
		$adata['address'] = $this->input->post('address');
		
		/*==================================================================================*/
		
		if(empty($adata['user_id']) OR empty($adata['types']) OR empty($adata['password'])){
			$sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Faild To Update !</strong> Please Try Again:)</div>';
		}else{

		$sdata['msg'] = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successfully Added !</strong> :)</div>';

		$adata['password'] = md5($adata['password']);		

        $this->User_model->Add_user($adata);   
        }

        $this->session->set_flashdata($sdata);          
        redirect('User/AddUser/',$sdata);  
     }   



/* ===================================================================================
| User data Delete method 
*/
	public function userRemoveById($id){
		$this->User_model->Remove_user($id);
		redirect('User/Alluser/');  
	}

	
/* ===================================================================================
| User data ACTIVE SYSTEM method 
*/
	public function UserpermissionActiveMethod($id){  		
		$table = 'tb_user';
		/*----------------------------------------------------------*/
		$data = array();
		$data['match_col'] = 'id';
		$data['match_by'] = $id; 
		$data['permission'] = 1;
		$this->User_model->Update_premission_model($table,$data);
		redirect('User/Alluser/');  
	}

/* ===================================================================================
| User data INACTIVE SYSTEM method 
*/
	public function UserpermissioninActiveMethod($id){ 
		$table = 'tb_user';
		/*----------------------------------------------------------*/
		$data = array();
		$data['match_col'] = 'id';
		$data['match_by'] = $id; 
		$data['permission'] = 0;
		$this->User_model->Update_premission_model($table,$data);
		redirect('User/Alluser/');  
	}

/* ===================================================================================
| User data Edit SYSTEM method 
*/
public function UpdateUser(){
		$data =array(
			'id' => $this->input->post('id'),
			'user_id' => $this->input->post('user_id'),
			'fullname' => $this->input->post('fullname'),
			'types' => $this->input->post('types'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'), 
			'address' => $this->input->post('address'),
		); 
		$this->User_model->UserUpdateData($data);
		$sdata = array();
		$sdata['msg'] = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successfully update !</strong> :)</div>';
        $this->session->set_flashdata($sdata); 
		redirect('User/Alluser/'); 
	}
	
	
	
	
	
	
	
	
	
	
	//All user profile ui Mehthod
	public function ChangePassword(){
		$data = array();
		$data['AlluserData'] = $this->Setting_model->Get_data_method('tb_user');
		
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
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Main File' => $this->load->view('template/user/password_change.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

	
	
	
	  
        public function Chanage_Password(){

        $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

        if($this->form_validation->run() == false){

            $data['title'] = "Chanage Password";
            $data = array(
                    'match_col' => 'id',
                    'match_by'  =>1
                );


			
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	
		
		$id = $this->session->userdata('user_id'); 
		$loadData['userData'] = $this->User_model->getUserByUserIdAuth($id); 
        
        $id = $this->session->userdata('id'); 
        $loadData['changePaswordData'] = $this->User_model->getUserByAuthpassword($id); 
        
      	$data = array(
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Main File' => $this->load->view('template/user/password_change.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
        
        }else{

            // Update Data
            $data = array(
                'password' => md5($this->input->post('new_pass')),
            );
          
            // Check Old {Password}
            $result = $this->User_model->Check_Auth_Old_Password($this->session->userdata('user_id'), md5($this->input->post('old_pass'))); 
            if($result > 0 AND $result === true ){
                // updata user data
                $result = $this->User_model->Update_Auth_User_Data($this->session->userdata('user_id'), $data);
                if($result > 0){

                /*-------msg------*/
                $Sdata['msg'] = '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button><strong>User Password Change Successfully Save!</strong> :)</div>';
                $this->session->set_flashdata($Sdata); 

                    return redirect('User/ChangePassword');
                }else{

                $Sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong><b>Error: </b>User Password not Change</strong> :)</div>';
                $this->session->set_flashdata($Sdata);

                    return redirect('User/ChangePassword');
                }
            }else{

                     $Sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong><b>Error: </b>User Old Password not Match</strong> :)</div>';
                $this->session->set_flashdata($Sdata);
                return redirect('User/ChangePassword');
            }
        }
        
    }///end password change 
    
	
	
}
