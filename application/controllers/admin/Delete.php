<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // $this->load->model('DeleteModel');
    }
    public function deleteData()
    {
        $userId = $this->input->post('userId');
        $table = $this->input->post('table');
        $pageUrl = $this->input->post('pageUrl');
        $columnName =$this->input->post('columnName');
        $data = array(
            "isDeleted" => 1,
        );
        $this->db->where($columnName, $userId);
        $this->db->update($table, $data);
        redirect(base_url($pageUrl));
    }
        public function deleteRealData()
    {
        $userId = $this->input->post('userId');
        $table = $this->input->post('table');
        $pageUrl = $this->input->post('pageUrl');
        $columnName =$this->input->post('columnName');
        $this->db->where($columnName, $userId);
        $this->db->delete($table);
        redirect(base_url($pageUrl));
    }
    public function deleteItems()
    {
        $userId = $this->input->post('userId');
        $column = $this->input->post('column');
        $table = $this->input->post('table');
        $pageUrl = $this->input->post('pageUrl');
        $data = array(
            "isDeleted" => 1,
        );
        $this->db->where($column, $userId);
        $this->db->update($table, $data);
        redirect(base_url($pageUrl));
    }
}
