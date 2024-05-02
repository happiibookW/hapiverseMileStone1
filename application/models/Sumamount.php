<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumamount extends CI_Model {

    public function getTotalSumAmount()
    {
        // Perform your database query to calculate the total sum amount
      //  $query = $this->db->select_sum('amount')->get('transections'); // Replace 'amount' with the column name in your table
      $query=$this->db->query("select sum(amount) as amount from transections")->result()[0];

        // Retrieve the result
        $result = $query->row();

        // Return the total sum amount
        return $result->amount;
    }
}
