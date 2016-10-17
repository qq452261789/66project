<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:26
 */

class Sites_m extends CI_Model{
    const SITE_SITES = 'sites';
    const ADM_ADMIN = 'admin';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取网站信息
     */
    public function get_site_by_id($id){
        $query = $this->db->query("select SITE_SITES.id,SITE_SITES.enname,SITE_SITES.sitestate from SITE_SITES where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 获取网站列表
     */
    public function get_sites(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query('select site_sites.id,zhname,enname,domain,sitestate,web_user.username from site_sites LEFT JOIN web_user ON site_sites.ownerid = web_user.id limit '.$offset.','.$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('SITE_SITES');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 修改网站信息
     */
    public function update_site(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();

        if($this->db->update('SITE_SITES',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}