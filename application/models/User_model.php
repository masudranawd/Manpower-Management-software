<?php
	class User_model extends CI_Model{

	/*USER LOGIN APPROVALS*/
		public function userLogin($data){
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->where('user_id',$data['user_id']);
			$this->db->where('password',md5($data['password']));
			$this->db->where('permission','1');
			$qresult = $this->db->get(); 
			$has  = $qresult->num_rows(); 

			if($has === 1){
				$result = $qresult->row(); 
				return $result; 
			}
		}

		public function GetUserById($data){
			$this->db->select('*'); 
			$this->db->from('tb_user'); 
			$this->db->where('id',$data['uid']); 
			$result = $this->db->get(); 
			$result = $result->row(); 
			return $result; 
		}
		public function User_status_on($id){
			$this->db->set('status',1);
			$this->db->where('id',$id);
			$this->db->update('tb_user');
		}		
		public function User_status_off($id){
			$this->db->set('status',0);
			$this->db->where('id',$id);
			$this->db->update('tb_user');
		}
		public function Update_premission_model($table,$data){
			$this->db->set('permission',$data['permission']);
			$this->db->where($data['match_col'],$data['match_by']);
			$this->db->update($table);
		}		
		public function Add_user($data){
			$this->db->insert('tb_user',$data);
		}	
		public function Remove_user($id){
			$this->db->where('id',$id);
			$this->db->delete('tb_user');
		}	
		public function RoleUpdateById($data){
			$this->db->set('types',$data['types']);
			$this->db->where('id',$data['id']); 
			$this->db->update('tb_user'); 
		}

		public function UserUpdateData($data){
			$this->db->set('id',$data['id']);
			$this->db->set('user_id',$data['user_id']);
			$this->db->set('fullname',$data['fullname']);
			$this->db->set('types',$data['types']);
			$this->db->set('email',$data['email']);
			$this->db->set('phone',$data['phone']);
			$this->db->set('address',$data['address']);
			$this->db->where('id',$data['id']);
			$this->db->update('tb_user'); 
		}
		public function ChangeUerPassword($data){
			$this->db->set('password',$data['password']);
			$this->db->where('id',$data['id']);
			$this->db->update('tb_user'); 
		}
		
		
		
		
				
		//Auth user password change
	public function getUserByAuthpassword($id){
		$this->db->select('*'); 
		$this->db->from('tb_user'); 
		$this->db->where('id',$id); 
		$result = $this->db->get(); 
		$result = $result->row(); 
		return $result; 
	}	

/*===========================================================
| USER Auth Password Change  
*/
	public function Check_Auth_Old_Password($user_id, $old_password){

		$this->db->where('user_id', $user_id);
		$this->db->where('password', $old_password);
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}


	public function Update_Auth_User_Data($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('user_id', $user_id);
		$this->db->update('tb_user');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	
		public function getUserByUserIdAuth($id){
		$this->db->select('*'); 
		$this->db->from('tb_user'); 
		$this->db->where('id',$id); 
		$result = $this->db->get(); 
		$result = $result->row(); 
		return $result; 
	}

		
}//end of model class.... 
