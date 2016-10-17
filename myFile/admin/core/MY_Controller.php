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
        //登录判断
        if(empty($_SESSION['admin'])){
            if(!empty($_COOKIE['admin'])){
                $user = json_decode($_COOKIE['admin'],true);
                $adname = $user['adname'];
                $this->load->Model('Admin_m');
                $result = $this->Admin_m->get_admin_by_adname($adname);
                if(!empty($result[0])){
                    if($result[0]->pwd==$user['secretkey']){
                        $_SESSION['admin']['adname'] = $result[0]->adname;
                        $_SESSION['admin']['email'] = $result[0]->email;
                        $_SESSION['admin']['phone'] = $result[0]->phone;
                        $_SESSION['admin']['roleid'] = $result[0]->roleid;
                    }else{
                        skips(site_url('Logins/login'),'密码已修改，请重先登录！');
                        exit;
                    }
                }else{
                    skips(site_url('Logins/login'),'账户变动，请重先登录！');
                    exit;
                }
            }else{
                skips(site_url('Logins/login'));
                exit;
            }
        }
        //超级管理员之外的管理员操作权限判断
        if($_SESSION['admin']['adname']!='admin'){
            $contrl = $this->router->fetch_class();
            $funcs = $this->router->fetch_method();
            //首页不作权限判断
            if($contrl!='Index' && $funcs!='index'){
                $this->load->Model('Funs_m');
                $conds = " and contrl='".$contrl."' and funcs='".$funcs."'";
                $result = $this->Funs_m->get_ffuns_id($conds);
                if(!empty($result)){
                    $roleid = $_SESSION['admin']['roleid'];
                    $funid = $result[0]->id;
                    $this->load->Model('Rights_m');
                    $rcond = "roleid='".$roleid."' and funid='".$funid."'";
                    $data = $this->Rights_m->get_right_id($rcond);
                    if(empty($data)){
                        skips(site_url(),'你没有此操作权限！');
                        exit;
                    }
                }else{
                    skips(site_url(),'不存在此方法！');
                    exit;
                }
            }
        }

    }

}

