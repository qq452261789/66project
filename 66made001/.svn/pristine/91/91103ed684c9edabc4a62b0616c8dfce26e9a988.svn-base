<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mods extends MY_Controller {
    /**
     * Controller
     * 获取模板列表
     */
	public function index(){
        $this->load->Model('Mods_m');
        $re = $this->Mods_m->get_mods();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('mods/index',$data);
	}

    /**
     * Controller
     * 添加模板
     */
	public function addMod(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Mods_m');
            $data = $this->Mods_m->add_mod();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='mods_index';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1) {
                $arr['statusCode']=200;
                $arr['message']="添加成功";
            }else if($data==2){
                $arr['message']="模板已存在";
            }else{
                $arr['message']="添加失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->view('mods/add');
        }
    }


    /**
     * Controller
     * 修改模板
     */
    public function updateMod(){
        $todo = $this->input->post('todo');
        $id = $this->input->get('id');
        if($todo=='save'){
            $this->load->Model('Mods_m');
            $data = $this->Mods_m->update_mod();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='mods_index';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="修改成功";
            }else if($data==2){
                $arr['message']="模板冲突";
            }else{
                $arr['message']="修改失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->Model('Mods_m');
            $re = $this->Mods_m->get_mod_by_id($id);
            $data['mod'] = $re[0];

            $this->load->view('mods/update',$data);
        }
    }


    /**
     * Controller
     * 删除模板
     */
    public function deleteMod(){
        $this->load->Model('Mods_m');
        $data = $this->Mods_m->delete_mod();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='mods_index';
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
