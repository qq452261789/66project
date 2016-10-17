<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:25
 */

class Admin extends MY_Controller{

    /**
     * Controller
     * 管理员列表
     */
    public function index(){
        $this->load->Model('Admin_m');
        $re = $this->Admin_m->get_admins();
        $admins = $re['list'];
        $this->load->Model('Role_m');
        foreach ($admins as $k => $v){
            $role = $this->Role_m->get_role_by_id($v->roleid);
            $admins[$k]->rolename = $role[0]->rolename;
        }
        $data['list'] = $admins;
        $data['page'] = $re['page'];

        $this->load->view('admins/index',$data);
    }

    /**
     * Controller
     * 添加管理员
     */
    public function addAdmin(){
        if($this->input->post('todo')=='save'){
            $this->load->Model('Admin_m');
            $data = $this->Admin_m->add_admin();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            $arr['navTabId']='admin_index';
            $arr['statusCode']=300;
            if($data==0){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['callbackType']="closeCurrent";
            }elseif($data==1){
                $arr['message']="用户已存在";
            }elseif($data == 3){
                $arr['message']="请输出正确的手机号";
            }elseif($data == 4){
                $arr['message']="请输出正确的邮箱";
            }elseif($data == 5){
                $arr['message']="该邮箱已注册";
            }elseif($data == 6){
                $arr['message']="该手机已注册";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->Model('Role_m');
            $roles = $this->Role_m->get_all_roles();
            $data['roles'] = $roles;
            $this->load->view('admins/add',$data );
        }
    }

    /**
     * Controller
     * 修改管理员信息
     */
    public function updateAdmin(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Admin_m');
            $data = $this->Admin_m->update_admin();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            $arr['navTabId']='admin_index';
            $arr['statusCode']=300;
            if($data == 0){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['callbackType']="closeCurrent";
            }elseif($data==1){
                $arr['message']="用户名已存在";
            }elseif($data == 3){
                $arr['message']="请输出正确的手机号";
            }elseif($data == 4){
                $arr['message']="请输出正确的邮箱";
            }elseif($data == 5){
                $arr['message']="该邮箱已注册";
            }elseif($data == 6){
                $arr['message']="该手机已注册";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Admin_m');
            $admin = $this->Admin_m->get_admin_by_id($id);
            $data['admin'] = $admin[0];
            $data['pwd'] = '';

            $this->load->Model('Role_m');
            $roles = $this->Role_m->get_all_roles();
            $data['roles'] = $roles;
            $this->load->view('admins/update',$data);
        }

    }

    /**
     * Controller
     * 删除管理员
     */
    public function deleteAdmin(){
        $this->load->Model('Admin_m');
        $data = $this->Admin_m->delete_admin();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='admin_index';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="操作成功";
        }elseif($data==2){
            $arr['message']="您不能删除超级管理员！";
        }else{
            $arr['message']="操作失败";
        }
        echo json_encode($arr);
    }

    /**
     * Controller
     * 管理员密码重置
     */
    public function resetPwd(){
        $this->load->Model('Admin_m');
        $data = $this->Admin_m->reset_pwd();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='admin_index';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="密码重置成功，新密码为：66made";
        }else{
            $arr['message']="操作失败";
        }
        echo json_encode($arr);
    }
}