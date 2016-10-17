<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-25 15:30
 */
class Apps_m extends CI_Model{
    const ADM_APPS = 'apps';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 获取应用APP列表
     */
    public function get_apps(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_APPS limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_APPS');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 添加应用
     */
    public function add_app(){
        $data = $this->input->post('data');
        $data['created'] = time();
        $data['updated'] = $data['created'];
        //验证手机价格格式
        $re = $this->price($data['appprice']);
        if( $re == -1){
            return 2;  //验证价格格式不对
        }
        if($this->db->insert('ADM_APPS',$data)){
            return 0;
        }
    }

    /**
     *
     * 检验价格的格式
     */
    public function price($price){
        if(is_numeric($price)){
            return 1;
        }else{
            return -1;
        }
    }

    /**
     * Model
     * 修改
     */
    public function update_app(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        //验证价格格式
        $re = $this->price($data['appprice']);
        if( $re == -1){
            return 2;  //验证价格格式不对
        }
        if($this->db->update('ADM_APPS',$data,array('id'=>$id))){
            return 0;
        }
        return false;

    }

    /**
     * Model
     * 删除
     */
    public function delete_app(){
        $this->id = $this->input->get('id');
        $this->updated = time();
        $this->appstate = 1;
        $this->deleted = time();
        if($this->db->update('ADM_APPS',$this,array('id'=>$this->id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 根据id获取信息
     */
    public function get_app_by_id($id){
        $query = $this->db->query("select * from ADM_APPS where id=".$id);
        return $query->result();
    }


}