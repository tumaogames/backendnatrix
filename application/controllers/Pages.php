<?php


class Pages extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function view($page = 'home', $offset = 0)
	{
		if(!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			show_404();
		}

		$this->load->library('pagination');
		$config['base_url'] = site_url('pages/view/home/');
		$config['total_rows'] = $this->Users_model->count_users();
		$config['per_page'] = 6;


		$this->pagination->initialize($config);

		$data['users'] = $this->Users_model->get_users($config['per_page'], $offset);

		$data['title'] = ucfirst($page);
		$data['name'] = $this->db->char_set;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}

	public function edit_user_view($user_id = 0)
	{
		$page = 'edit_user_view';
		if(!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			show_404();
		}
		$data['user'] = $this->Users_model->get_user($user_id);
		$data['title'] = ucfirst($page);
		$data['name'] = $this->db->char_set;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/register_view');
		$this->load->view('templates/footer');
	}
}