<?php

class AdminModel extends CI_Model
{
	// login model for admin
	public function login($credentials)
	{
		$this->db->where($credentials);
		return $this->db->get("mstadmin")->row_array();
	}
	public function insert($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	public function fetchTerm($var = null)
	{
	 return $this->db->get('termcondition')->row_array();
	}
	public function updateTerm($data)
	{
		$this->db->where('termId','0');
		return $this->db->update('termcondition',$data);
	}
	public function fetchfaq($var = null)
	{
	 return $this->db->get('faq')->result_array();
	}
	public function updatePrivacy($data)
	{
		$this->db->where('faqId','0');
		return $this->db->update('faq',$data);
	}
}
