<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {

	public function index()
	{
		$res = array('name'=>'art','age'=>25);
		$this->output->enable_profiler(true);
		$this->benchmark->mark('mybench_start');
		//$this->load->view('mypage');
		dump($res);
		$this->benchmark->mark('mybench_end');
	}

	public function mymethod()
	{
		//$this->load->library("benchmark");
		//$this->load->view("mypage");
		echo 'hello worldd';
	}
}