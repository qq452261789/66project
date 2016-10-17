<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Sitetype_m extends CI_Model{
    const SITE_SITETYPE = 'sitetype';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 获取网站类型列表
     */
    public function get_sitetypes(){
        $query = $this->db->query("select * from SITE_SITETYPE where deleted is NULL ");
        return $query->result();
    }

}