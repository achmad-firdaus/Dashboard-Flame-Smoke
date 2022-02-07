<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Key extends CI_Controller {

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
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
	}

	public function input($ID="", $TYPE="", $VALUE="")
	{
        $select = $this->db->select('*')->from('monitoring')->where('flag',1)->get();
        $len = $select->num_rows();
        $raw = $select->result_array();
        for ($i=0; $i < $len; $i++) { 
            $date2  = strtotime($raw[$i]['date_time']);
            $date1 = strtotime(date('Y-m-d H:i:s'));
            $diff  = $date1 - $date2;
            $hour   = floor($diff / (60 * 60));
            $minutes = $diff - ( $hour * (60 * 60) );
            $minutes=floor( $minutes / 60 );
            // print_r($date1);
            //     echo '------------';
            // print_r($minutes); echo '------------';
            // print_r($raw[$i]);
            // echo '<br>';
            if ($minutes>1) {
                if ($minutes>2) {
                    $data['locations'] = $this->db->select('locations')->from('monitoring')->where('id',$raw[$i]['id'])->limit(1)->get()->row_array()['locations'];
                    $data['status']='TROUBLE';
                    $data['flag']=1;
                    $data['sensor_type']='-';
                    $data['id']=$raw[$i]['id'];
                    $this->db->set('flag',0)->where('id',$raw[$i]['id'])->update('monitoring');
                    $this->db->insert('monitoring',$data);   
                }
            }
        }

        if (!empty($ID)||!empty($TYPE)||!empty($VALUE)) {
            $data = array(
                'id'=>$ID,
            );

            if ($VALUE == 0) {
                $id = $this->db->select('id')->from('monitoring')->where('id',$data['id'])->where('status','NORMAL')->limit(1)->get()->row_array();
                // print_r($id);
                if ($id) {
                    $this->db->set('flag',0)->where('id',$data['id'])->update('monitoring');
                    $data['date_time'] = date('Y-m-d H:i:s');
                    $this->db->set('date_time',$data['date_time']);
                    $this->db->set('sensor_type',$TYPE);
                    $this->db->set('flag',1);
                    $this->db->where('status','NORMAL');
                    $this->db->where('ID',$data['id']);
                    $this->db->update('monitoring');    
                }else {
                    $data['locations'] = $this->db->select('locations')->from('monitoring')->where('id',$data['id'])->limit(1)->get()->row_array()['locations'];
                    $data['status']='NORMAL';
                    $data['flag']=1;
                    $data['sensor_type']=$TYPE;
                    $this->db->set('flag',0)->where('id',$data['id'])->update('monitoring');
                    $this->db->insert('monitoring',$data);                        
                }
                return 'success updated';
            } else {
                $data['locations'] = $this->db->select('locations')->from('monitoring')->where('id',$data['id'])->limit(1)->get()->row_array()['locations'];
                $data['status']='ALARM';
                $data['sensor_type']=$TYPE;
                $this->db->set('flag',0)->where('id',$data['id'])->update('monitoring');
                $this->db->insert('monitoring',$data);
                return 'success insert';
            }
        } else {
            return 'forbiden';
        }
	}

}
