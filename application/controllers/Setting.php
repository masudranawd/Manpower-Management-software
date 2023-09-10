<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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

	public function index()
	{
		$this->Category();
	}

//setting category ui method
	public function Category(){

		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
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
		//file link
		$data = array(
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('template/setting/category.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//setting genarel ui method
	public function Genarel(){

		$data = array();
		//file link

		
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
			'Main File' => $this->load->view('template/setting/genarel.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

// setting Error page 
	public function Error(){
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
			'Left ment' => $this->load->view('inc/left_menu.php',$data),
			'Header' 	=> $this->load->view('inc/header.php',$data),
			'Main File' => $this->load->view('inc/404.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

// setting Expenses Category ui

	public function ExpensesCatgory(){
		$data = array();

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
			'Main File' => $this->load->view('template/setting/expenses_cat.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
	
// setting Expenses Category ui

	public function ReceiveCategory(){
		$data = array();

		$data['AllExpensesCat'] = $this->Setting_model->Get_data_method('tb_expenses_category');
		$data['AllCashINOutCat'] = $this->Setting_model->Get_data_method('tb_cashin_out_cat');
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
			'Main File' => $this->load->view('template/setting/receive_category.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
// Payment Method 

	public function PayMethod(){
		$data = array();

		$data['AllPayMethod'] = $this->Setting_model->Get_data_method('tb_pay_method');
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
			'Main File' => $this->load->view('template/setting/pay_method.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
	
// Expense Category 

	public function AdddReceiveCategory(){
		$data 	= array();
		$table 	='tb_cashin_out_cat';
		$data['name'] = $this->input->post('name');

		if (empty($data['name'])) {
			$datas['smg'] = "<h4 style='color:red;'> Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ReceiveCategory');
		}else{
			$this->Setting_model->insert_data_model($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :) Add New CashIN & Out Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
        
			$datas['smg'] = "<h4 style='color:green;'> Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ReceiveCategory');
		}//else

	}//end



// Update Expenses Category
	public function UpdateReceiveCategory(){
		$data 	= array();
		$table 	='tb_cashin_out_cat';
		$data['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');

		if (empty($data['name'])) {
			$datas['smg'] = "<h4 style='color:red;'>Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ReceiveCategory');
		}else{
			$this->Setting_model->CashINOut_cat_update_data_model($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update CashIN & Out Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
			$datas['smg'] = "<h4 style='color:green;'>Successfuly Updated !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ReceiveCategory');
		}//else

	}
	

	public function RemoveCashInOut($id){
		$data = array();
		$table = 'tb_cashin_out_cat';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Remove CashIN & Out Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['smgdu'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Setting/ReceiveCategory');
	}

//General setting update
    public function GeneralUpdate(){
		$sdata = array();
		$table= 'tb_setting';
		$sdata['id']          = $this->input->post('id');
		$sdata['title']       = $this->input->post('title');
		$sdata['name']        = $this->input->post('name');
		$sdata['address']     = $this->input->post('address');
		$sdata['phone']     = $this->input->post('phone');
		$sdata['email']     = $this->input->post('email');
		if(empty($sdata['id'] )){
		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Faild Update Save!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
			redirect('Setting/Genarel/'); 
			}else{

				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["logo"]['name'];
				if(!empty($change_image)){
				unlink('images/'.$old_image); 
				$new_name                   	= $change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/';
				$config['remove_spaces']        =FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $sdata['logo'] = $new_name;

			    if (! $this->upload->do_upload('logo')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
				}
		$this->Setting_model->GeneralsettingUpdate($table,$sdata); 

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update Genarel Setting By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successfully Update!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
		redirect('Setting/Genarel/'); 
		}

    }

	
//StemUpdate setting update
    public function StemUpdate(){
		$sdata = array();
		$table= 'tb_setting';
		$sdata['id']          = $this->input->post('id');
		if(empty($sdata['id'] )){
		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Faild Update Save!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
			redirect('Setting/Genarel/'); 
			}else{

				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["stemp_image"]['name'];
				if(!empty($change_image)){
				unlink('images/'.$old_image); 
				$new_name                   	= $change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/';
				$config['remove_spaces']        =FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $sdata['stemp_image'] = $new_name;

			    if (! $this->upload->do_upload('stemp_image')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
				}
		$this->Setting_model->GeneralsettingStemUpdate($table,$sdata); 

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update Genarel Stem By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successfully Update!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
		redirect('Setting/Genarel/'); 
		}

    }

public function SignatureImageUpdate(){
		$sdata = array();
		$table= 'tb_setting';
		$sdata['id']          = $this->input->post('id');
		if(empty($sdata['id'] )){
		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Faild Update Save!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
			redirect('Setting/Genarel/'); 
			}else{

				$old_image	= $this->input->post('old_image');
				/*-----------------------------------------------*/
				$change_image = $_FILES["signature_image"]['name'];
				if(!empty($change_image)){
				unlink('images/'.$old_image); 
				$new_name                   	= $change_image; 
				$config['file_name']        	= $new_name;
				$config['upload_path']          = 'images/';
				$config['remove_spaces']        =FALSE;
			    $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);
			    $sdata['signature_image'] = $new_name;

			    if (! $this->upload->do_upload('signature_image')){
			    $error = array('error' => $this->upload->display_errors());
			    $this->load->view('upload_form', $error);
			    }else{	
			    array('upload_data' => $this->upload->data());
			     }
				}
		$this->Setting_model->GeneralsettingSignatureUpdate($table,$sdata); 

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update Signature By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		/*-------msg------*/
		$Sdata['msg'] = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successfully Update!</strong> :)</div>';
		$this->session->set_flashdata($Sdata); 
		redirect('Setting/Genarel/'); 
		}

    }



// Setting Functions 
	public function AddNewVisaCategory(){
		$data 	= array();
		$table 	='tb_visa_category';
		$data['cat_name'] = $this->input->post('cat_name');

		if (empty($data['cat_name'])) {
			$datas['smg'] = "<h4 style='color:red;'>Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}else{
			$this->Setting_model->insert_data_model($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :) Add New Visa Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
			$datas['smg'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}//else

	}//end

	//remove visa category
	public function remove_visa_category($id){
		$data=array();
		$table ='tb_visa_category';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :) Remove Visa Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$datas['smg'] = "<h4 style='color:red;'>Deleted Done !</h4>";
       	$this->session->set_flashdata($datas);
        redirect('Setting');
	}

//update visa category 
	public function UpdateVisaCategory(){
		$data 	= array();
		$table 	='tb_visa_category';
		$data['id'] = $this->input->post('id');
		$data['cat_name'] = $this->input->post('cat_name');

		if (empty($data['cat_name'])) {
			$datas['smg'] = "<h4 style='color:red;'>Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}else{
			$this->Setting_model->cat_update_data_model($table,$data);

		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update visa Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$datas['smg'] = "<h4 style='color:green;'>Successfuly Updated !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}//else

	}


// Add New Visa Type Functions 
	public function AddNewVisaType(){
		$data 	= array();
		$table 	='tb_visa_type';
		$data['visa_type'] = $this->input->post('visa_type');

		if (empty($data['visa_type'])) {
			$datas['smgv'] = "<h4 style='color:red;'>Invalid ! Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}else{
			$this->Setting_model->insert_data_model($table,$data);
		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :) Add Vida Type By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$datas['smgv'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting');
		}//else

	}//end


//remove visa Type
	public function remove_visa_type($id){
		$data=array();
		$table ='tb_visa_type';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Visa Type By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
		$datas['smgdu'] = "<h4 style='color:red;'>Deleted Done !</h4>";
       	$this->session->set_flashdata($datas);
        redirect('Setting');
	}

//update visa Type 
	public function UpdateVisaType(){
		$data 	= array();
		$table 	='tb_visa_type';
		$data['id'] = $this->input->post('id');
		$data['visa_type'] = $this->input->post('visa_type');
		$this->Setting_model->update_visa_data_model($table,$data);
			/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :)Update Visa Type By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
		$datas['smgdu'] = "<h4 style='color:green;'> Successfuly Updated !</h4>";
        $this->session->set_flashdata($datas);
        redirect('Setting');
	}

// Expense Category 
	public function AddNewExpensesCategory(){
		$data 	= array();
		$table 	='tb_expenses_category';
		$data['expenses_cat_name'] = $this->input->post('expenses_cat_name');

		if (empty($data['expenses_cat_name'])) {
			$datas['smg'] = "<h4 style='color:red;'> Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ExpensesCatgory');
		}else{
			$this->Setting_model->insert_data_model($table,$data);
		/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-success"> Success :) Add Expense Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
			$datas['smg'] = "<h4 style='color:green;'> Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ExpensesCatgory');
		}//else
	}//end


// Update Expenses Category
	public function UpdateExpensesCategory(){
		$data 	= array();
		$table 	='tb_expenses_category';
		$data['id'] = $this->input->post('id');
		$data['expenses_cat_name'] = $this->input->post('expenses_cat_name');

		if (empty($data['expenses_cat_name'])) {
			$datas['smg'] = "<h4 style='color:red;'>Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ExpensesCatgory');
		}else{
			$this->Setting_model->Expenses_cat_update_data_model($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :) Update Expense Category By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
			$datas['smg'] = "<h4 style='color:green;'>Successfuly Updated !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/ExpensesCatgory');
		}//else
	}



//remove visa Type
	public function RemoveExpenseCat($id){
		$data=array();
		$table ='tb_expenses_category';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
	/*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Expense Type By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span> </div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
		$datas['smgdu'] = "<h4 style='color:red;'>Deleted Done !</h4>";
       	$this->session->set_flashdata($datas);
        redirect('Setting/ExpensesCatgory');
	}



	public function CashIn($id){
		$data = array();
		$table = 'tb_cashin_out_cat';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$data['status'] = 1;
		$this->Setting_model->Update_acitivity_model($table,$data);
        redirect('Setting/ReceiveCategory');
	}

	public function Cashout($id){
		$data = array();
		$table = 'tb_cashin_out_cat';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$data['status'] = 0;
		$this->Setting_model->Update_acitivity_model($table,$data);
        redirect('Setting/ReceiveCategory');
	}



//Payment Method Add 

	public function AddNewBank(){
		$data 	= array();
		$table 	='tb_pay_method';
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_number'] = $this->input->post('account_number');
		if (empty($data['bank_name'])) {
			$datas['smgv'] = "<h4 style='color:red;'>Invalid ! Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/PayMethod');
		}else{
			$this->Setting_model->insert_data_model($table,$data);

			$datas['smgv'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/PayMethod');
		}//else

	}



// Update Expenses Category
	public function UpdatePaymethodData(){
		$data 	= array();
		$table 	='tb_pay_method';
		$data['id'] = $this->input->post('id');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_number'] = $this->input->post('account_number');

		if (empty($data['id'])) {
			$datas['smgv'] = "<h4 style='color:red;'>Please Check Name !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/PayMethod');
		}else{
			$this->Setting_model->Payment_update($table,$data);

			$datas['smgv'] = "<h4 style='color:green;'>Successfuly Updated !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Setting/PayMethod');
		}//else

	}
	

//remove visa Type
	public function PayMethodRemove($id){
		$data=array();
		$table ='tb_pay_method';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);

		$datas['smgv'] = "<h4 style='color:red;'>Deleted Done !</h4>";
       	$this->session->set_flashdata($datas);
        redirect('Setting/PayMethod');
	}





//Debit voucher
	public function debitvoucher($id){

		$data = array();
		//file link
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));

		$InData = array();	
		$Intable = 'tb_voucher';
		$InData['match_col'] = 'id';
		$InData['match_by'] = $id; 
		$data['VoucherData'] = $this->Setting_model->Get_Date_ById_method($Intable,$InData);

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
	$data['Amountword'] = convert_number($data['VoucherData']->amount);
		

/*number word convert*/
		/*----------------setting------------------*/	
		$siteData = array();	
		$sitetable = 'tb_setting';
		$siteData['match_col'] = 'id';
		$siteData['match_by'] = 1; 
		$data['SiteData'] = $this->Setting_model->Get_Date_ById_method($sitetable,$siteData);
		/*----------------setting------------------*/	

		$data = array(
			'Main File' => $this->load->view('template/safa/debit-voucher.php',$data),
		
		);
		$this->load->view('index',$data);
	}//end


//Add Voucher
	public function Addvoucher(){

		$data = array();
		$data['Voucher'] = $this->Accounts_model->Get_data_singleData_id('tb_voucher',$data);
		//file link
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
			'Main File' => $this->load->view('template/safa/add_voucher.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end


//Add Voucher
	public function Allvoucher(){

		$data = array();
		//$data['Voucher'] = $this->Accounts_model->Get_data_singleData_id('tb_voucher',$data);
		$data['AllVoucherlist'] =  $this->Setting_model->Get_data_method('tb_voucher');
		//file link
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
			'Main File' => $this->load->view('template/safa/all_voucher_list.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end

//Receive Edit 
	public function voucherEdit($id){
		$data = array();

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		
	    /*----------------invoice data------------------*/	
		$ReData = array();	
		$Retable = 'tb_voucher';
		$ReData['match_col'] = 'id';
		$ReData['match_by'] = $id; 
		$data['VoucherData'] = $this->Setting_model->Get_Date_ById_method($Retable,$ReData);

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
			'Main File' => $this->load->view('template/safa/edit_voucher.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}//end




	public function AddNewVoucher(){

		$data = array();
		$table = 'tb_voucher';
		$data['vou_no'] 	= $this->input->post('vou_no');
		$data['type'] 	= $this->input->post('type');
		$data['vou_date'] 	= $this->input->post('vou_date');
		$data['on_account']	 	= $this->input->post('on_account');
		$data['account']	= $this->input->post('account');
		$data['received'] 	= $this->input->post('received');
		$data['amount'] 	= $this->input->post('amount');

		if (empty($data['vou_no']) OR empty($data['type']) OR empty($data['amount'])) {
			$mdata['sms'] = "<b style='color:red;'> Faild ! chcek Entry Type, Amount</b>";
			$this->session->set_flashdata($mdata);
			redirect('deposit');
		}else{
			$id = $this->Account_model->Insert_id_data_model($table,$data);
			$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
			$this->session->set_flashdata($mdata);
			  redirect('Setting/debitvoucher/'.$id);
		    }

		}


/*Receive Pay Edit*/
	public function EditNewVoucher(){

		$data = array();
		$table = 'tb_voucher';
		$data['id'] = $this->input->post('id');
		$data['vou_no'] 	= $this->input->post('vou_no');
		$data['type'] 	= $this->input->post('type');
		$data['vou_date'] 	= $this->input->post('vou_date');
		$data['account']	= $this->input->post('account');	
		$data['received'] 	= $this->input->post('received');
		$data['on_account']	= $this->input->post('on_account');	
		$data['amount'] 	= $this->input->post('amount');

		$this->Setting_model->EditVoucherData($table,$data);

		$mdata['sms'] = "<b style='color:orange;'> Successfuly Save !</b>";
		$this->session->set_flashdata($mdata);

		 redirect('Setting/debitvoucher/'.$data['id'] );
		 

	}



/* Remove Function */
	public function VoucherRemove($id){
		$data = array();
		$table = 'tb_voucher';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
		$datas['sms'] = "<b style='color:red;'>Deleted Done !</b>";
       	$this->session->set_flashdata($datas);
        redirect('Allvoucher');
	}
	





}
