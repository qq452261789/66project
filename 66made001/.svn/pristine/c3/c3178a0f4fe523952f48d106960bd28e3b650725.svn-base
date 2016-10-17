<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {

    /**
     * Controller
     * 获取角色列表
     */
	public function getRoles(){
        $this->load->Model('Role_m');
        $re = $this->Role_m->get_roles();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('roles/list',$data);
	}

    /**
     * Controller
     * 添加角色
     */
	public function addRole(){
	    $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Role_m');
            $data = $this->Role_m->add_role();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            $arr['navTabId']='role_getroles';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1) {
                $arr['statusCode']=200;
                $arr['message']="添加成功";
            }else if($data==2){
                $arr['message']="角色已存在";
            }else{
                $arr['message']="添加失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->view('roles/add');
        }
    }

    /**
     * Controller
     * 修改角色
     */
    public function updateRole(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Role_m');
            $data = $this->Role_m->update_role();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='role_getroles';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="修改成功";
            }else if($data==2){
                $arr['message']="角色冲突";
            }else{
                $arr['message']="修改失败";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Role_m');
            $re = $this->Role_m->get_role_by_id($id);
            $data['role']=$re[0];
            $this->load->view('roles/update',$data);
        }
    }


    /**
     * Controller
     * 删除角色
     */
    public function deleteRole(){
        $this->load->Model('Role_m');
        $data = $this->Role_m->delete_role();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='role_getroles';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="删除成功";
        }else{
            $arr['message']="删除失败";
        }
        echo json_encode($arr);
    }
}
