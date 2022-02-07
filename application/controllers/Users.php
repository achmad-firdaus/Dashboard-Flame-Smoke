<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		if (empty($this->session->userdata('roles'))) {
			redirect('login');
		}
	}
	
    public function index()
	{
		$data['active'] = 'users';
        $data['title'] = 'USERS MENU';
		$data['view'] = "users/users";
		$data['addJs'][] = "assets/js/view-users.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("template", $data);
	}

    public function getUserss()
    {
        $json_data = array();
        $this->db->select('*')->from('users');
        $getUsers = $this->db->get()->result_array();

        for ($i=0; $i < count($getUsers); $i++) {
            $url_edit = base_url().'users/edit/'.$getUsers[$i]['id'];
            $url_delete = base_url().'users/delete/'.$getUsers[$i]['id'];
            $getUsers[$i]['action'] = '<a class="btn btn-info" href="'.$url_edit.'" role="button">Edit</a> || <a class="btn btn-danger" href="'.$url_delete.'" role="button">Delete</a>';
            $json_data['data'][$i] = $getUsers[$i];
        }

        echo json_encode($json_data);
    }

    public function delete($id='')
    {
        if ($id) {
            $this->db->where('id',$id);
            $this->db->delete('users');
        }
        redirect('users');
    }
    public function edit($id="")
    {
        $getUser = $this->db->select('*')->from('users')->where('id', $id)->get()->row_array();
        $data['getUser'] = $getUser;
		$data['active'] = 'users';
        $data['title'] = 'USERS EDIT';
		$data['view'] = "users/edit";
		$data['addJs'][] = "assets/js/view-users.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("template", $data);
    }

    public function udate()
    {
        $data = array(
            'id' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        );

        if ($data['id']) {
            $password=$this->input->post('password');
            $roles = $this->input->post('roles');
            if ($roles) {
                $data['roles'] = $roles;
            }
            if ($password) {
                $data['password'] = $password;
            }
    
            $this->db->where('id',$data['id']);
            $this->db->update('users', $data);
        }
        redirect('users');
    }

    public function add()
    {
		$data['active'] = 'users';
        $data['title'] = 'USERS ADD';
		$data['view'] = "users/add";
		$data['addJs'][] = "assets/js/view-users.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("template", $data);
    }

    public function save()
    {
        $data = array(
            'id' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        );
        $password=$this->input->post('password');
        $roles = $this->input->post('roles');
        $data['roles'] = $roles;
        $data['password'] = $password;

        $this->db->insert('users', $data);

        redirect('users');
    }

}
