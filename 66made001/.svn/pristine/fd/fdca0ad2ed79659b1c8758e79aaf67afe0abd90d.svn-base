<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 10:04
 */

class Indexs extends MY_Controller{
    /**
     * Controller
     * 默认主页
     */
    public function index(){
        $data['adname'] = $_SESSION['admin']['adname'];
        $roleid = $_SESSION['admin']['roleid'];
        $this->load->Model('Rights_m');
        if($_SESSION['admin']['adname']=='admin'){
            $re = $this->Rights_m->get_all_rights();
        }else{
            $re = $this->Rights_m->get_all_rights_by_role($roleid);
        }
        $data['list'] = $re;
        $this->load->view('index', $data);
    }
}