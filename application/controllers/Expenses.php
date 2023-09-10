<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends CI_Controller {

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

	public function index(){
		$this->AddExpense();
	}

	public function AddExpense(){

		$data = array();	
		$data['AllExpenceData'] = $this->Accounts_model->Get_data_method('tb_payment');
		$data['AllExpensesCat'] = $this->Expenses_model->Get_data_method('tb_expenses_category');
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
			'Main File' => $this->load->view('template/expenses/add_expenses.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

	public function AllExpenses(){

		$data = array();
		$data['AllExpensesData'] =  $this->Expenses_model->Get_data_method('tb_expenses');
		$data['AllExpensesCat'] = $this->Expenses_model->Get_data_method('tb_expenses_category');
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
			'Main File' => $this->load->view('template/expenses/all_expenses.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
// Expense Report 
	public function ExpensesReport(){

		$data = array();
		$data['AllExpensesData'] =  $this->Expenses_model->Get_data_method('tb_expenses');
		$data['AllExpensesCat'] = $this->Expenses_model->Get_data_method('tb_expenses_category');
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
			'Main File' => $this->load->view('template/expenses/Expenses_report.php',$data),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}
// Daily Expense Report 


	public function DailyExpenseSearch(){
		$data = array();

		$sdata=array(
			'expense_date' => $this->input->post('expense_date'), 
			//'visa_no' => $this->input->post('visa_no'), 
			);		
		$data['DailyExpenseData'] =  $this->Expenses_model->Get_data_by_search_key_model('tb_expenses',$sdata);
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
			'Main File' => $this->load->view('template/expenses/daily_expenses_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

// Daily Expense Report Catgory Type 


	public function DailyExpenseCategorySearch(){
		$data = array();

		$sdata=array(
			'expense_date' => $this->input->post('expense_date'), 
			'expense_cat_id' => $this->input->post('expense_cat_id'), 
			);

		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		//var_dump($sdata);die();
		$data['DailyExpenseData'] =  $this->Expenses_model->Get_data_Dayily_Expense_search_key_model('tb_expenses',$sdata);

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
			'Main File' => $this->load->view('template/expenses/daily_expenses_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}


	public function weeklymonthSearch(){
		$data = array();

		$sdata=array(
			'fromdate' 	=> $this->input->post('fromdate'), 
			'todate' 	=> $this->input->post('todate'), 
			);		
		
		$data['pData'] = $this->User_model->GetUserById(array('uid'=>$this->session->id));
		$data['DayWeekExpenseData'] =  $this->Expenses_model->Get_data_D_W_by_search_key_model('tb_expenses',$sdata);
		
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
			'Main File' => $this->load->view('template/expenses/w_d_expenses_report.php',$sdata),
			'Footer' 	=> $this->load->view('inc/footer.php',$data)
		);
		$this->load->view('index',$data);
	}

	// And New Expenses
	public function AddNewExpenses(){

		$data 	= array();
		$table 	='tb_payment';
		$data['expense_cat_id'] = $this->input->post('expense_cat_id');
		//$data['for_payment'] = $this->input->post('for_payment');
		$data['method'] = $this->input->post('method');
		$data['expense_payment'] = $this->input->post('expense_payment');
		$data['payment_date'] = $this->input->post('payment_date');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['bank_recepit_n'] = $this->input->post('bank_recepit_n');
		$data['bkash_n'] = $this->input->post('bkash_n');
		$data['rocket_n'] = $this->input->post('rocket_n');
		$data['details'] = $this->input->post('details');
		$data['type'] = 'Office';
		if (empty($data['expense_cat_id']) OR empty($data['expense_payment'] )) {
			$datas['smg'] = "<h4 style='color:red;'>Invalid!</h4>";
            $this->session->set_flashdata($datas);
            redirect('Expenses');
		}else{
			$this->Setting_model->insert_data_model($table,$data);

      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :)Add  Expenses Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

			$datas['smg'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
            $this->session->set_flashdata($datas);
            redirect('Expenses');
		}//else
	}

	public function UpdateExpenses(){
		$data 	= array();
		$table 	='tb_payment';
		$data['id'] 	= $this->input->post('id');
		$data['payment_date'] 	= $this->input->post('payment_date');
		$data['expense_cat_id'] = $this->input->post('expense_cat_id');
		$data['details'] = $this->input->post('details');
		$data['expense_payment']  = $this->input->post('expense_payment');
 
      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-warning"> Success :)Update  Expenses Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/

		$this->Expenses_model->UpdateExpense_data_model($table,$data);
		$datas['smg'] = "<h4 style='color:green;'>Successfuly Save !</h4>";
        $this->session->set_flashdata($datas);
        redirect('Expenses');

		}//else

	public function Expense_Romve($id){
		$data=array();
		$table ='tb_payment';
		$data['match_by'] 	= $id;
		$data['match_col']  = 'id';
		$this->Setting_model->Get_remove_data_method($table,$data);
 
      /*activity Details*/
		$ATable = 'tb_activity';
		$AData = array();
		$AData['activity_details'] = '<div class="alert alert-danger"> Success :)Remove Expense Payment By &mdash; '.$this->session->fullname.'<span style="font-size:12px;">('.$this->session->user_id.')</span></div>';
		$this->Setting_model->insert_data_model($ATable,$AData); //ACTIVITY UPDATED...
        /*activity details*/
		$datas['smg'] = "<h4 style='color:red;'>Deleted Done !</h4>";
       	$this->session->set_flashdata($datas);
        redirect('Expenses');
	}
}//end Accounts Controller