<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Sourcetype_m extends CI_Model{
    const WEB_SOURCETYPE = 'sourcetype';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 获取用户素材类型列表
     */
    public function get_sourcetypes(){
        $query = $this->db->query("select * from WEB_SOURCETYPE where deleted is NULL");
        return $query->result();
    }
}