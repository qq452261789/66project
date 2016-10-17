<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/9
 * Time: 9:29
 */
class Uindex extends MY_Controller{
    /**
     * Controller
     * 前端主页
     */
    public function index(){
        if(!empty($_SESSION['user'])){
            $data['username'] = $_SESSION['user']['username'];
        }
        if(!empty($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'],true);
            $data['username'] = $user['username'];
        }
        $this->load->view('uindex/index', $data);
    }
}