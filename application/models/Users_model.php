<?php


class Users_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function login_user($username, $password)
	{
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		 if($query->num_rows() == 1)
		 {
		 	return $query->result()[0]->id;
		 } else {
		 	return FALSE;
		 }
		//return $username;

	}

	public function logout_user()
	{
		$this->session->sess_destroy();
		redirect('home/view');
	}




	public function register_user($data)
	{
		$this->db->set($data);
		$query = $this->db->insert('users');
		dump($query);
	}

	public function get_users($numofrow, $offset)
	{
		$query = $this->db->get('users',$numofrow, $offset);
	        return $query->result_array();
	}

	public function get_user($user_id)
	{
		$query = $this->db->get_where('users', array('id' => $user_id));
	        return $query->row();
	}

	public function count_users(){
		return $this->db->get('news')->num_rows();
	}

	public function update_user($user_id, $data){
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
	}

	public function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete('users');
	}
}