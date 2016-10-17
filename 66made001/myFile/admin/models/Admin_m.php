<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:26
 */

class Admin_m extends CI_Model{
    const ADM_ADMIN = 'admin';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取管理员信息
     */
    public function get_admin_by_id($id){
        $query = $this->db->query("select * from ADM_ADMIN where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 查询管理员名称是否注册
     */
    public function get_admin_by_adname($name,$id=""){
        if(!empty($id)){
            $query = $this->db->query("select * from ADM_ADMIN where adname='".$name."' and id!=".$id);
        }else{
            $query = $this->db->query("select * from ADM_ADMIN where adname='".$name."'" );
        }

        return $query->result();
    }

    /**
     * Model
     * 查询邮箱是否已经注册
     */
    public function get_admin_by_email($email,$id=""){
        if(!empty($id)){
            $query = $this->db->query("select * from ADM_ADMIN where email='".$email."' and id!=".$id);
        }else{
            $query = $this->db->query("select * from ADM_ADMIN where email='".$email."'" );
        }

        return $query->result();
    }
    /**
     * Model
     * 查询管理员手机号码是否已经注册
     */
    public function get_admin_by_phone($phone,$id=""){
        if(!empty($id)){
            $query = $this->db->query("select * from ADM_ADMIN where phone='".$phone."' and id!=".$id);
        }else{
            $query = $this->db->query("select * from ADM_ADMIN where phone='".$phone."'" );
        }

        return $query->result();
    }

    /**
     * Model
     * 获取管理员列表
     */
    public function get_admins(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_ADMIN limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_ADMIN');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;

    }

    /**
     * Model
     * 添加管理员
     */
    public function add_admin(){
        $data = $this->input->post('data');
        $data['pwd'] = md5(md5($data['pwd']).SECRETKEY);
        $data['created'] = time();
        $data['updated'] = time();
        $admin = $this->get_admin_by_adname($data['adname']);
        if(!empty($admin)){
            return 1;
        }
        $admin = $this->get_admin_by_email($data['email']);
        if(!empty($admin)){
            return 5;
        }
        $admin = $this->get_admin_by_phone($data['phone']);
        if(!empty($admin)){
            return 6;
        }
        //验证手机号码格式
        $result_phone = $this->check_phone($data['phone']);
        if( $result_phone == false){
            return 3;  //验证手机号码格式不对
        }
        //验证邮箱格式
        $result_mail = $this->check_email($data['email']);
        if( $result_mail == false){
            return 4;  //验证邮箱不对
        }
        if($this->db->insert('ADM_ADMIN',$data)){
            return 0;
        }
    }


    /**
     * Model
     * 修改管理员信息
     */
    public function update_admin(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['updated'] = time();
        if(empty($data['pwd'])){
            unset($data['pwd']);
        }
        //验证手机号码格式
        $result_phone = $this->check_phone($data['phone']);
        if( $result_phone == false){
            return 3;  //验证手机号码格式不对
        }
        //验证邮箱格式
        $result_mail = $this->check_email($data['email']);
        if( $result_mail == false){
            return 4;  //验证邮箱不对
        }

        $admin = $this->get_admin_by_adname($data['adname'],$id);
        if(!empty($admin)){
            return 1;
        }
        $admin = $this->get_admin_by_email($data['email'],$id);
        if(!empty($admin)){
            return 5;
        }
        $admin = $this->get_admin_by_phone($data['phone'],$id);
        if(!empty($admin)){
            return 6;
        }
        if($this->db->update('ADM_ADMIN',$data,array('id'=>$id))){
            return 0;
        }
            return false;

    }

    /**
     * Model
     * 删除管理员
     */
    public function delete_admin(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['state'] = 2;
        $re = $this->get_admin_by_id($id);
        //不能删除超级管理员
        if($re[0]->adname=='admin'){
            return 2;
        }
        if($this->db->update('ADM_ADMIN',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 重置密码
     */
    public function reset_pwd(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['pwd'] = md5(md5('66made').SECRETKEY);

        if($this->db->update('ADM_ADMIN',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 验证手机号码格式
     */

    public function check_phone($phone)
    {
        if (preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            return true;
        } else {
            return false;
        }
    }

        /**
         * Model
         * 验证邮箱格式(不能两条连续下划线)
         */
        public function check_email($email){
            if(preg_match("/^[0-9a-zA-Z]+(?:[_-][a-z0-9-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*.[a-zA-Z]+$/i",$email)){
                return true;
            }else{
                return false;
            }
        }
}