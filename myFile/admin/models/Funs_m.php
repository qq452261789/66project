<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Funs_m extends CI_Model{
    const ADM_FUN = 'fun';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取功能信息
     */
    public function get_fun_by_id($id){
        $query = $this->db->query("select * from ADM_FUN where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 分页所有功能信息
     */
    public function get_funs(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_FUN where deleted is NULL limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_FUN');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 获取功能列表
     */
    public function get_ffuns($cond=""){
        $query = $this->db->query("select * from ADM_FUN where deleted is NULL ".$cond);
        $data = $query->result();

        return $data;
    }

    /**
     * Model
     * 获取功能id
     */
    public function get_ffuns_id($cond=""){
        $query = $this->db->query("select id from ADM_FUN where deleted is NULL ".$cond);
        $data = $query->result();

        return $data;
    }


    /**
     * Model
     * 添加功能
     */
    public function add_fun(){
        $data = $this->input->post('data');
        $data['created'] = time();
        $data['updated'] = time();
        if($data['fid']==0){
            $query = $this->db->query("select * from ADM_FUN where funname='".$data['funname']."'");
        }else{
            $query = $this->db->query("select * from ADM_FUN where funname='".$data['funname']."' or (contrl='".ucfirst($data['contrl'])."' and funcs='".$data['funcs']."')");
        }
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->insert('ADM_FUN',$data)){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 修改功能
     */
    public function update_fun(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        if($data['fid']==0){
            $query = $this->db->query("select * from ADM_FUN where funname='".$data['funname']."' AND id!=".$id);
        }else{
            $query = $this->db->query("select * from ADM_FUN where (funname='".$data['funname']."' or (contrl='".ucfirst($data['contrl'])."' and funcs='".$data['funcs']."')) AND id!=".$id);
        }
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->update('ADM_FUN',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除功能
     */
    public function delete_fun(){
        $this->id = $this->input->get('id');
        $this->updated = time();
        $this->deleted = time();

        if($this->db->update('ADM_FUN',$this,array('id'=>$this->id))){
            return 1;
        }
        return 0;
    }
}