<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugs extends MY_Controller {
    /**
     * Controller
     * 获取插件列表
     */
	public function index(){
        $this->load->Model('Plugs_m');
        $re = $this->Plugs_m->get_plugs();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('plugs/index',$data);
	}

    /**
     * Controller
     * 添加插件
     */
	public function addPlug(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Plugs_m');
            $data = $this->Plugs_m->add_plug();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            if($data==1) {
                $arr['statusCode']=200;
                $arr['message']="添加成功";
                $arr['navTabId']='plugs_index';
                $arr['callbackType']="closeCurrent";
                echo json_encode($arr);
            }else if($data==2){
                $arr['statusCode']=300;
                $arr['message']="插件已存在";
                $arr['navTabId']='plugs_index';
                $arr['callbackType']="closeCurrent";
                echo json_encode($arr);
            }else{
                $arr['statusCode']=300;
                $arr['message']="添加失败";
                $arr['navTabId']='plugs_index';
                $arr['callbackType']="closeCurrent";
                echo json_encode($arr);
            }
        }else{
            $this->load->view('plugs/add');
        }
    }


    /**
     * Controller
     * 修改插件
     */
    public function updatePlug(){
        $todo = $this->input->post('todo');
        $id = $this->input->get('id');
        if($todo=='save'){
            $this->load->Model('Plugs_m');
            $data = $this->Plugs_m->update_plug();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='plugs_index';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="修改成功";
            }else if($data==2){
                $arr['message']="插件冲突";
            }else{
                $arr['message']="修改失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->Model('Plugs_m');
            $re = $this->Plugs_m->get_plug_by_id($id);
            $data['plug'] = $re[0];

            $this->load->view('plugs/update',$data);
        }
    }


    /**
     * Controller
     * 删除插件
     */
    public function deletePlug(){
        $this->load->Model('Plugs_m');
        $data = $this->Plugs_m->delete_plug();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='plugs_index';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="修改成功";
        }else{
            $arr['message']="修改失败";
        }
        echo json_encode($arr);
    }
}
