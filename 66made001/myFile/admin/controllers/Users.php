<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:25
 */

class Users extends MY_Controller{

    /**
     * Controller
     * 用户列表
     */
    public function index(){
        $this->load->Model('Users_m');
        $re = $this->Users_m->get_users();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];
        $data['location'] = 'index';

        $this->load->view('users/index',$data);
    }

    /**
     * Controller
     * 会员列表
     */
    public function member(){
        $this->load->Model('Users_m');
        $re = $this->Users_m->get_member();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];
        $data['location'] = 'member';

        $this->load->view('users/index',$data);
    }

    /**
     * Controller
     * 添加用户
     */
    public function addUser(){
        $todo = $this->input->post('todo');
        $location = $this->input->get('location')?$this->input->get('location'):$this->input->post('location');
        if($todo=='save'){
            $this->load->Model('Users_m');
            $data = $this->Users_m->add_user();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['statusCode']=300;
            $arr['navTabId']='users_'.$location;
            $arr['callbackType']="";
            if($data==0){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['callbackType']="closeCurrent";
            }elseif($data==1){
                $arr['statusCode']=300;
                $arr['message']="用户名或邮箱已存在";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $data['location'] = $location;
            $this->load->view('users/add',$data);
        }
    }

    /**
     * Controller
     * 修改用户
     */
    public function updateUser(){
        $todo = $this->input->post('todo');
        $location = $this->input->get('location')?$this->input->get('location'):$this->input->post('location');
        if($todo=='save'){
            $this->load->Model('Users_m');
            $data = $this->Users_m->update_user();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            $arr['navTabId']='users_'.$location;
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['callbackType']="closeCurrent";
            }else if($data==2){
                $arr['message']="用户名已存在";
            }else if($data==3){
                $arr['message']="邮箱已被注册";
            }else if($data==4){
                $arr['message']="手机号已存在";
            }else{
                $arr['message']="系统繁忙，稍后再试";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Users_m');
            $user = $this->Users_m->get_user_by_id($id);
            $data['user'] = $user[0];
            $data['pwd'] = '';
            $data['location'] = $location;

            $this->load->view('users/update',$data);
        }
    }

    /**
     * Controller
     * 删除用户
     */
    public function deleteUser(){
        $location = $this->input->get('location');
        $this->load->Model('Users_m');
        $data = $this->Users_m->delete_user();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='users_'.$location;
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="操作成功";
        }else{
           $arr['message'] = "操作失败";
        }
        echo json_encode($arr);
    }

}