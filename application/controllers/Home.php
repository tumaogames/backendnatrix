<?php


class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function view($page = 'login_view')
	{
		if(!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}

}