<?php

class GeneralModel extends CI_Model
{

    ######################## group model functions ########################
    public function fetchIntrest($data="")
    {
      $list =$this->db->get("mstintrestcategory")->result_array();
		
      $i=0;
      $returnarray=array();
      foreach($list as $arr){
        $returnarray[$i]['intrestCategoryId']=$arr['intrestCategoryId'];
        $returnarray[$i]['intrestCategoryTitle']=$arr['intrestCategoryTitle'];
        $returnarray[$i]['interestImage']=$arr['interestImage'];
         $returnarray[$i]['isActive']=$arr['isActive'];
        $returnarray[$i]['intrestSubCategory']=$this->fetchSubIntrest($arr['intrestCategoryId']);
        $i +=1; // yeh mera change hai hamza
      }
      return $returnarray;
    }
    public function fetchSubIntrest($intrestId)
    {
      $this->db->where("intrestCategoryId",$intrestId);
      return $this->db->get("mstintrestsubcategory")->result_array();

    }
}
