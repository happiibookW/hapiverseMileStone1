<?php

class GeneralModel extends CI_Model
{
	
    public function fetchSingle($compare,$table)
    {
        $this->db->where($compare);
        return $this->db->get($table)->row_array();
    }
	public function insert($data,$table)
	{
		return $this->db->insert($table,$data);
	}
    public function update($data,$table,$compare){
        $this->db->where($compare);
        return $this->db->update($table,$data);
    }
    public function fetch( $table = null)
    {
      return $this->db->get($table)->result_array();
    }
    public function fetchSubInterest( $var = null)
    {
       return $this->db->select('t1.*, t2.intrestCategoryTitle')
     ->from('mstintrestsubcategory as t1')
    //  ->where('t1.id', $id)
     ->join('mstintrestcategory as t2', 't1.interestCategoryId = t2.intrestCategoryId', 'LEFT')
     ->get()->result_array();
    }
    public function fetchSingleSubInterest( $compare = null)
    {
       return $this->db->select('t1.*, t2.intrestCategoryTitle')
     ->from('mstintrestsubcategory as t1')
     ->where($compare)
     ->join('mstintrestcategory as t2', 't1.interestCategoryId = t2.intrestCategoryId', 'LEFT')
     ->get()->row_array();
    }
}
