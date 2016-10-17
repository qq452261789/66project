<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Plugs_m extends CI_Model{
    const ADM_PLUGS = 'plugs';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取插件信息
     */
    public function get_plug_by_id($id){
        $query = $this->db->query("select * from ADM_PLUGS where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 分页所有插件信息
     */
    public function get_plugs(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_PLUGS limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_PLUGS');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 添加插件
     */
    public function add_plug(){
        $data = $this->input->post('data');
        $data['created'] = time();
        $data['updated'] = time();
        $query = $this->db->query("select id from ADM_PLUGS where plugname='".$data['plugname']."'");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->insert('ADM_PLUGS',$data)){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 修改插件
     */
    public function update_plug(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        $query = $this->db->query("select * from ADM_PLUGS where id!=".$id." and plugname='".$data['plugname']."'");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->update('ADM_PLUGS',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除插件
     */
    public function delete_plug(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['deleted'] = time();
        $data['plugstate'] = 1;

        if($this->db->update('ADM_PLUGS',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}