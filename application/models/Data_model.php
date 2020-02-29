<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_model extends CI_Model {

    function login($logindata)
    {
        $this->db->where('isactive',1);
        $this->db->where('email',$logindata['email']);
        $this->db->where('password',md5($logindata['password']));
        $res = $this->db->get('login');
        // echo $this->db->last_query();
        if ($res->num_rows()>0) {
            $row = $res->row();
            $this->session->set_userdata('id',$row->id);
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('email',$row->email);
            // $ok = $this->session->userdata();
            // print_r($ok['email']);
            return 1;
        }else{
            return 2;
        }
    }

function task_view(){
        $user_id = $this->session->userdata('id');
        // $this->db->where('isactive',1); 
        $this->db->where('ts.created_by',$user_id); 
        $this->db->select('*'); 
        // $this->db->from('task as ts'); 
        $this->db->join('project_list as pl','pl.pid = ts.project_id','LEFT'); 
    $qry = $this->db->get('task as ts'); 
    // echo $this->db->last_query(); exit;
        // $qry = $this->db->get('tb_serptracker as tp');
          if( ($qry->num_rows()) > 0 ){ return $qry->result_array(); }else{  return false;  }
    }

    function project_list()
    {
        $this->db->where('isactive',1);
        $qry = $this->db->get('project_list');
        if ($qry) {  return $qry->result_array();  }else{ return 2; }
    }


        function task_add($data)
    {
        $qry = $this->db->insert('task',$data);
        if ($qry) {  return 1;  }else{ return 2; }
    }


        function register($userdata)
    {
        $qry = $this->db->insert('login',$userdata);
        if ($qry) {  return 1;  }else{ return 2; }
    }



}


?>

