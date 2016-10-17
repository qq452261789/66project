<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:26
 */

class Users_m extends CI_Model{
    const WEB_USER = 'user';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取用户信息
     */
    public function get_user_by_id($id){
        $query = $this->db->query("select * from WEB_USER where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 根据id获取用户信息
     */
    public function get_user_by_name($name){
        $query = $this->db->query("select * from WEB_USER where username='".$name."'");
        return $query->result();
    }

    /**
     * Model
     * 获取用户列表
     */
    public function get_users(){
        $level = 0;  //0:yiban
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from WEB_USER WHERE WEB_USER.memberlevel = ".$level." limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('WEB_USER');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;

    }

    /**
     * Model
     * 获取用户等级不为0列表，（会员列表）
     */
    public function get_member(){
        $level = 0;
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from WEB_USER WHERE WEB_USER.memberlevel != ".$level." limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('WEB_USER');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;

    }


    /**
     * Model
     * 添加新用户信息
     */
    public function add_user(){
        $data = $this->input->post('data');
        $data['pwd'] = md5(md5($data['pwd']).SECRETKEY);
        $data['created'] = time();
        $data['updated'] = time();
        $query = $this->db->query("select * from WEB_USER where username='".$data['username']."' or email='".$data['email']."'");
        $user = $query->result();
        if(!empty($user)){
            return 1;
        }
        if($this->db->insert('WEB_USER',$data)){
            return 0;
        }
    }

    /**
     * Model
     * 修改用户信息
     */
    public function update_user(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        if(!empty($data['pwd'])){
            $data['pwd'] = md5(md5($data['pwd']).SECRETKEY);
        }else{
            unset($data['pwd']);
        }
        $data['updated'] = time();
        $query1 = $this->db->query("select * from WEB_USER where id!=".$id." and username='".$data['username']."'");
        $query2 = $this->db->query("select * from WEB_USER where id!=".$id." and email='".$data['email']."'");
        $query3 = $this->db->query("select * from WEB_USER where id!=".$id." and phone='".$data['phone']."'");
        if($query1->result()){
            //用户名冲突
            return 2;
        }
        if($query2->result()){
            //邮箱冲突
            return 3;
        }
        if($query3->result()){
            //手机冲突
            return 4;
        }
        if($this->db->update('WEB_USER',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除用户
     */
    public function delete_user(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['state'] = 2;
        if($this->db->update('WEB_USER',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}