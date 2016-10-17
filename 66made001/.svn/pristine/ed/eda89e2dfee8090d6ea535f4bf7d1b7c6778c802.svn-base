<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 9:24
 */
class MY_Controller extends CI_Controller{
    /**
     * 构造函数
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
        //如果session不存在user，再判断cookie是否存在user
        if(empty($_SESSION['user'])){
            //如果cookie存在，则把用户信息存入到session中
            if(!empty($_COOKIE['user'])){
                $user = json_decode($_COOKIE['user'],true);
                $username = $user['username'];
                $this->load->Model('Login_m');
                $result = $this->Login_m->get_user_by_name($username);
                if(!empty($result[0])){
                    if($result[0]->state==1){
                        //如果当前cookie中的用户已被禁用，则移除该cookie并跳转
                        unset($_SESSION['user']);
                        setcookie('user','',time()-3600*24*365,base_url());
                        skips(site_url('Logins/login'),'账号被禁用，请联系管理员！');
                        return;
                    }
                    if($result[0]->state==2){
                        //如果当前cookie中的用户已被删除，则移除该cookie并跳转
                        unset($_SESSION['user']);
                        setcookie('user','',time()-3600*24*365,base_url());
                        skips(site_url('Indexs/index'),'账号已被删除！');
                        return;
                    }
                    if($result[0]->pwd==$user['secretkey']){
                        $_SESSION['user']['id'] = $result[0]->id;
                        $_SESSION['user']['username'] = $result[0]->username;
                        $_SESSION['user']['email'] = $result[0]->email;
                        $_SESSION['user']['phone'] = $result[0]->phone;
                    }else{
                        skips(site_url('Logins/login'),'密码已过期，请重先登录！');
                        return;
                    }
                }else{
                    skips(site_url('Logins/register'),'用户不存在，请先注册！');
                    return;
                }
            }else{
                //如果session和cookie都为空，则跳转到网站首页
                skips(site_url('Indexs/index'));
                return;
            }
        }
    }

}

