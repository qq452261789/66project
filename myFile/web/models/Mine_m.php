<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Mine_m extends CI_Model{
    const WEB_USER = 'user';

    public function __construct(){
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
     * 修改用户信息
     */
    public function update_mine(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        //密码加密
        if(!empty($data['pwd'])){
            $this->pwd = md5(md5($data['pwd']).SECRETKEY);
        }
        $data['updated'] = time();

        if($this->db->update('WEB_USER',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

}