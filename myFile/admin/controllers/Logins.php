<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 14:33
 */

class Logins extends CI_Controller{
     /**
     * Controller
     * 跳转至登陆页面
     */
    public function login(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Login_m');
            $data = $this->Login_m->login();
            if($data==0){
                skips('login',"用户不存在！");
            }
            if($data==1){
                skips(site_url('Indexs/index'));
            }
            if($data==2){
                skips('login', "密码错误！");
            }
            if($data==3){
                skips('login', "你已被禁用！");
            }
            if($data==4){
                skips('login', "你已被删除！");
            }
        }else{
            $this->load->view('logins/login');
        }
    }


    /**
     * Controller
     * 用户登出
     */
    public function logout(){
        unset($_SESSION['admin']);
        setcookie('admin','',time()-3600*24*365,'/');
        skips('login');
    }

}