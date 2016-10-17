<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 15:14
 */

class Login_m extends CI_Model{
    const ADM_ADMIN = 'admin';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 用户登陆
     */
    public function login(){
        $data = $this->input->post('data');
        $query = $this->db->query("select * from ADM_ADMIN where adname='".$data['adname']."' limit 0,1");
        $result = $query->result();
        if(!empty($result)){
            if($result[0]->state==1){
                return 3;
            }
            if($result[0]->state==2){
                return 4;
            }
            //解密并对比密码
            if($result[0]->pwd == md5(md5($data['pwd']).SECRETKEY)){
                if($this->input->post('rempwd')=='on'){
                    $admin = array();
                    $admin['secretkey'] = $result[0]->pwd;
                    $admin['pwd'] = md5(md5('66made').SECRETKEY);
                    $admin['adname'] = $result[0]->adname;
                    $admin = json_encode($admin);
                    setcookie('admin',$admin,time()+3600*24*365,'/');
                }else{
                    $_SESSION['admin']['adname'] = $result[0]->adname;
                    $_SESSION['admin']['email'] = $result[0]->email;
                    $_SESSION['admin']['phone'] = $result[0]->phone;
                    $_SESSION['admin']['roleid'] = $result[0]->roleid;
                }
                //登陆成功
                return 1;
            }else{
                //密码错误
                return 2;
            }
            //用户名不存在
            return 0;
        }
    }

}