<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['active'] = 'login';
		$data['title'] = 'login';
		// $data['view'] = "login/login";
		$data['addJs'][] = "assets/js/view-report.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("login/login", $data);
	}

	public function singin()
	{
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
		
		$getUser = $this->db->select('*')->from('users')->where($data)->limit(1)->get()->row_array();
		if (isset($getUser['username'])) {
			$this->session->set_userdata('roles', $getUser['roles']);
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('message_name', 'Plese check again username and password');
			redirect('login');
		}		
	}

}
