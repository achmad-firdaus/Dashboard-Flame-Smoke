<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['active'] = 'dashboard';
		$data['title'] = 'DASHBOARD';
		$data['view'] = "dashboard/dashboard";
		$data['addJs'][] = "assets/js/view-dashboard.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("template", $data);
	}

	public function getMonitoring()
	{
		$this->db->start_cache();
		$idwidget =$this->input->post('idwidget', TRUE);
		$limit =$this->input->post('count', TRUE);
		if ($idwidget) {
			if ($idwidget == 1) {
				$this->db->where('status', 'NORMAL');
			}
			if ($idwidget == 2) {
				$this->db->where('status', 'ALARM');
			}
			if ($idwidget == 3) {
				$this->db->where('status', 'TROUBLE');
			}
		}
		// if ($limit) {
		// 	$this->db->limit($limit);
		// } else {
		// 	$this->db->limit(5);
		// }
		$this->db->stop_cache();
		
		$get = $this->db->select('*')
						->from('monitoring')->where('flag',1)
						->order_by("UNIX_TIMESTAMP(date_time)", 'DESC');
		$get = $this->db->get()->result();
		$json_data['data']= $get;
		$json_data['debug']= $limit;
		echo json_encode($json_data);
	}

	public function getWidget()
	{
		$sql =
		"
			SELECT 
			(
				SELECT 
				COALESCE(
					COUNT(*), 
					0
				) AS NORMAL 
				FROM 
				(
					SELECT 
					count(id) AS qty_normal 
					FROM 
					monitoring 
					WHERE 
					status = 'NORMAL' 
					AND flag=1
					GROUP BY 
					id
				) AS A
			) AS NORMAL, 
			(
				SELECT 
				COALESCE(
					COUNT(*), 
					0
				) AS NORMAL 
				FROM 
				(
					SELECT 
					count(id) AS qty_normal 
					FROM 
					monitoring 
					WHERE 
					status = 'ALARM' 
					AND flag=1
					GROUP BY 
					id
				) AS A
			) AS ALARM, 
			(
				SELECT 
				COALESCE(
					COUNT(*), 
					0
				) AS NORMAL 
				FROM 
				(
					SELECT 
					count(id) AS qty_normal 
					FROM 
					monitoring 
					WHERE 
					status = 'TROUBLE' 
					AND flag=1
					GROUP BY 
					id
				) AS A
			) AS TROUBLE, 
			(
				SELECT 
				COALESCE(
					COUNT(*), 
					0
				) AS NORMAL 
				FROM 
				(
					SELECT 
					count(id) AS qty_normal 
					FROM 
					monitoring 
					WHERE 
					flag=1
					GROUP BY 
					id
				) AS A
			) AS TOTALS
		";
		$getQty = $this->db->query($sql)->row_array();

		$normal = '<a id="normal" href="javascript:functionNormal(1,'.$getQty['NORMAL'].');" style="color:black" data-params="available" data-toggle="tooltip" data-placement="bottom" title="Click here to see detail">'.$getQty['NORMAL'].'</a>';
		$alarm = '<a id="alarm" href="javascript:functionNormal(2,'.$getQty['ALARM'].');" style="color:black" data-params="available" data-toggle="tooltip" data-placement="bottom" title="Click here to see detail">'.$getQty['ALARM'].'</a>';
		$trouble = '<a id="trouble" href="javascript:functionNormal(3,'.$getQty['TROUBLE'].');" style="color:black" data-params="available" data-toggle="tooltip" data-placement="bottom" title="Click here to see detail">'.$getQty['TROUBLE'].'</a>';
		$totals = '<a id="totals" href="javascript:functionNormal(4,'.$getQty['TOTALS'].');" style="color:black" data-params="available" data-toggle="tooltip" data-placement="bottom" title="Click here to see detail">'.$getQty['TOTALS'].'</a>';
		$json_data['normal'] = $normal;
		$json_data['alarm'] = $alarm;
		$json_data['trouble'] = $trouble;
		$json_data['totals'] = $totals;
		echo json_encode($json_data);
	}
}
