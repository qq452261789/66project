<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Mods_m extends CI_Model{
    const ADM_MODS = 'mods';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取模板信息
     */
    public function get_mod_by_id($id){
        $query = $this->db->query("select * from ADM_MODS where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 分页所有模板信息
     */
    public function get_mods(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_MODS limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_MODS');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 添加模板
     */
    public function add_mod(){
        $data = $this->input->post('data');
        $data['created'] = time();
        $data['updated'] = time();
        $query = $this->db->query("select id from ADM_MODS where modname='".$data['modname']."'");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->insert('ADM_MODS',$data)){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 修改模板
     */
    public function update_mod(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        $query = $this->db->query("select * from ADM_MODS where id!=".$id." and modname='".$data['modname']."'");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->update('ADM_MODS',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除模板
     */
    public function delete_mod(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['deleted'] = time();
        $data['modstate'] = 1;

        if($this->db->update('ADM_MODS',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}