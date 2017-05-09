<?php
class Ranking_Model extends CI_Model{
    
    function getRankingDataByRegional($regional_id){
        $this->db->select('*');
        $this->db->join('regional_ranking rg','rk.regional_id = rg.regional_id');
        $this->db->where('rk.regional_id',$regional_id);
        $this->db->order_by('points','desc');
        $query = $this->db->get('ranking rk');
        return $query->result_array();
    }
    
    //get dữ liệu của bảng regional_ranking
    function getRegional(){
        $this->db->select('regional_id,regional_name');
        $query = $this->db->get('regional_ranking');
        return $query->result_array();
    }
    
    //get dữ liệu của bảng regional_ranking theo id
    function getRegionalById($id){
        $this->db->where('regional_id',$id);
        return $this->db->get('regional_ranking')->row();
    }
}
