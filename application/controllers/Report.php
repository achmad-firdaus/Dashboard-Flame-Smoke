<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$data['active'] = 'report';
		$data['title'] = 'Report';
		$data['view'] = "report/report";
		$data['addJs'][] = "assets/js/view-report.js";
		$data['addJs'][] = "assets/js/paper-dashboard.min.js?v=2.0.1";
		$this->load->view("template", $data);
	}

    public function generate_report()
    {
        // Load plugin PHPExcel nya
		require_once APPPATH."/third_party/PHPExcel/PHPExcel.php";
        // include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        // $data = array(
        //     'start_date' => $this->input->post('start_date'),
        //     'end_date' => $this->input->post('end_date'),
        //     'status' => $this->input->post('status'),
        // );

		$this->db->select('*')->from('monitoring');
		$select = $this->db->get()->result_array();
		
		// if (!empty($select['id'])) {
            $csv = new PHPExcel();
            $csv->getProperties()->setCreator('Thirty Seven Projects')
                        ->setLastModifiedBy('Achmad')
                        ->setTitle("")
                        ->setSubject("")
                        ->setDescription("Data Export")
                        ->setKeywords("");

            $csv->setActiveSheetIndex(0);
            // $csv->getActiveSheet()->getColumnDimension('D1')->setAutoSize(true);
            
            $csv->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $csv->getActiveSheet()->setCellValue('A1', "No");
            $csv->getActiveSheet()->setCellValue('B1', "Type");
            $csv->getActiveSheet()->setCellValue('C1', "Month");
            $csv->getActiveSheet()->setCellValue('D1', "Payment");

            $no = 1; 
            $numrow = 2; 
            foreach($select as $data){ 
                $csv->getActiveSheet()->setCellValue('A'.$numrow, $no);
                $csv->getActiveSheet()->setCellValue('B'.$numrow, 'NODE 1');
                $csv->getActiveSheet()->setCellValue('C'.$numrow, $data['id']);
                $csv->getActiveSheet()->setCellValue('D'.$numrow, $data['locations']);
                
                $no++; 
                $numrow++; 
            }
            
            /*Rename sheet*/
            // $csv->getActiveSheet()->setTitle("Report Payment");

            $fileName = "Report";
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // // header('Content-Disposition: attachment; filename="Data Siswa.csv" '); 
            header('Content-Disposition: attachment; filename='.$fileName.'.csv'); 
            header('Cache-Control: max-age=0');
            // $write = new PHPExcel_Writer_CSV($csv, 'Excel5');
            // $write->save('php://output');

            /* Redirect output to a client’s web browser (Excel5)*/
            $objWriter = PHPExcel_IOFactory::createWriter($csv, 'Excel5');
            $objWriter->save('php://output');
		// }
    }

}
