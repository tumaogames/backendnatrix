<?php


class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);

			$this->session->set_flashdata($data);

			redirect('home/view/login_view');
		} else if($this->Users_model->login_user($username, $password) != FALSE )
		{
			$user_id = $this->Users_model->login_user($username, $password);

			$user_data = array('user_id' => $user_id, 'username' => $username, 'login' => TRUE);

			$this->session->set_userdata('user', $user_data);

			redirect('pages/view');

		} else
		{
			$this->session->set_flashdata('errors', 'Username not found or wrong password.');

			redirect('home/view/login_view');
		}
	}
	
	public function unityLogin()
	{
	    $username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);

			//$this->session->set_flashdata($data);

			echo json_encode($data);
		} else if($this->Users_model->login_user($username, $password) != FALSE )
		{
			$user_id = $this->Users_model->login_user($username, $password);
			$user_contact_number = $this->Users_model->get_contact_number($username, $password);
			$user_data = array('user_id' => (int)$user_id, 'username' => $username, 'login' => TRUE, 'contact_number' => (int)$user_contact_number);

			$this->session->set_userdata('user', $user_data);

			$user_data = $this->session->userdata('user');

			//Returns User's name 
			echo json_encode($user_data);

		} else
		{
			//$this->session->set_flashdata('errors', 'Username not found or wrong password.');

			echo json_encode('Username not found or wrong password.');
		}
	}

	public function unityRegister()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_again = $this->input->post('password_again');
		$email = $this->input->post('email');
		$contact_number = $this->input->post('contact_number');

		/*$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_again', 'Password_again', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('contact_number', 'Contact_number', 'trim|required|min_length[3]|integer');*/

		/*if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);

			//$this->session->set_flashdata($data);
			echo json_encode($data);
		} else
		{*/
		 	$data = array(
				'username' => $username,
				'password' => $password,
				'password_again' => $password_again,
				'email' => $email,
				'contact_number' => $contact_number
			);
		 	$this->Users_model->register_user($data);
		 	//$this->session->set_flashdata('errors', 'User registered');
			 echo json_encode($data);
		 	
		 	/*if($this->Users_model->login_user($username, $password) != FALSE )
			{
				$user_id = $this->Users_model->login_user($username, $password);

				$user_data = array('user_id' => $user_id, 'username' => $username, 'login' => TRUE);

				$this->session->set_userdata('user', $user_data);

				redirect('pages/view');

		 	}*/
		//}
	}

	public function register()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_again = $this->input->post('password_again');
		$email = $this->input->post('email');
		$contact_number = $this->input->post('contact_number');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_again', 'Password_again', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('contact_number', 'Contact_number', 'trim|required|min_length[3]');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);

			$this->session->set_flashdata($data);
			redirect('pages/register');
		} else
		{
		 	$data = array(
				'username' => $username,
				'password' => $password,
				'password_again' => $password_again,
				'email' => $email,
				'contact_number' => $contact_number
			);
		 	$this->Users_model->register_user($data);
		 	$this->session->set_flashdata('errors', 'User registered');
		 	
		 	if($this->Users_model->login_user($username, $password) != FALSE )
			{
				$user_id = $this->Users_model->login_user($username, $password);

				$user_data = array('user_id' => $user_id, 'username' => $username, 'login' => TRUE);

				$this->session->set_userdata('user', $user_data);

				redirect('pages/view');

		 	}
		}
	}

	public function logout()
	{
		$this->Users_model->logout_user();
	}

	public function update($user_id)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_again = $this->input->post('password_again');
		$email = $this->input->post('email');
		$contact_number = $this->input->post('contact_number');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_again', 'Password_again', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('contact_number', 'Contact_number', 'trim|required|min_length[3]');

		if($this->form_validation->run() == FALSE)
		{
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata($data);
				redirect('pages/edit_user_view/'. $user_id);
		} else
		{
			$data = array(
				'username' => $username,
				'password' => $password,
				'password_again' => $password_again,
				'email' => $email,
				'contact_number' => $contact_number);
		$this->Users_model->update_user($user_id, $data);
		$this->session->set_flashdata('errors', 'Updated');
		redirect('pages/edit_user_view/'. $user_id);

		}
	}

	public function delete($user_id)
		{
			$this->Users_model->delete_user($user_id);
			redirect('pages/view');
		}
}
