<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sum extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sumamount'); 
    }

    public function getTotalSum()
    {
        
        $totalSum = $this->Sumamount->getTotalSumAmount();

        
        $this->output->set_content_type('application/json');

        
        $this->output->set_output(json_encode(['total_sum' => $totalSum]));
    }
}
