<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Role_m extends CI_Model{
    const ADM_ROLE = 'role';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取角色信息
     */
    public function get_role_by_id($id){
        $query = $this->db->query("select * from ADM_ROLE where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 获取角色列表
     */
    public function get_all_roles(){
        $query = $this->db->query("select * from ADM_ROLE where deleted is NULL");
        return $query->result();
    }


    /**
     * Model
     * 分页获取角色列表
     */
    public function get_roles(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_ROLE where deleted is NULL  limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_ROLE');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 添加角色
     */
    public function add_role(){
        $data = $this->input->post('data');
        $data['created'] = time();
        $data['updated'] = time();
        $query = $this->db->query("select * from ADM_ROLE where rolename='".$data['rolename']."'");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->insert('ADM_ROLE',$data)){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 修改角色
     */
    public function update_role(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        $query = $this->db->query("select * from ADM_ROLE where rolename='".$data['rolename']."' and id!=".$id);
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->update('ADM_ROLE',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除角色
     */
    public function delete_role(){
        $id = $this->input->get('id');
        $this->updated = time();
        $this->deleted = time();

        if($this->db->update('ADM_ROLE',$this,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}