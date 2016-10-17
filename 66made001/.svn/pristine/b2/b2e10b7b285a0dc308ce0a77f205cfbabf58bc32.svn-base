<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funs extends MY_Controller {
    /**
     * Controller
     * 获取功能列表
     */
	public function getFuns(){
        $this->load->Model('Funs_m');
        $re = $this->Funs_m->get_funs();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('funs/list',$data);
	}

    /**
     * Controller
     * 添加功能
     */
	public function addFun(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Funs_m');
            $data = $this->Funs_m->add_fun();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='funs_getfuns';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1) {
                $arr['statusCode']=200;
                $arr['message']="添加成功";
            }else if($data==2){
                $arr['message']="功能已存在";
            }else{
                $arr['message']="添加失败";
            }
            echo json_encode($arr);
        }else{
            //获取一级菜单
            $this->load->Model('Funs_m');
            $data['floder'] = $this->Funs_m->get_ffuns("and fid=0 and contrl='#' and funcs='#' and isnav=1");

            $this->load->view('funs/add',$data);
        }
    }


    /**
     * Controller
     * 修改功能
     */
    public function updateFun(){
        $todo = $this->input->post('todo');
        $id = $this->input->get('id');
        if($todo=='save'){
            $this->load->Model('Funs_m');
            $data = $this->Funs_m->update_fun();
            $arr['rel']='';
            $arr['forwardUrl']='';
            $arr['navTabId']='funs_getfuns';
            $arr['callbackType']="closeCurrent";
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="修改成功";
            }else if($data==2){
                $arr['message']="功能冲突";
            }else{
                $arr['message']="修改失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->Model('Funs_m');
            $re = $this->Funs_m->get_fun_by_id($id);
            $data['fun'] = $re[0];
            //获取一级菜单
            $this->load->Model('Funs_m');
            $data['floder'] = $this->Funs_m->get_ffuns("and fid=0 and contrl='#' and funcs='#' and isnav=1");

            $this->load->view('funs/update',$data);
        }
    }


    /**
     * Controller
     * 删除功能
     */
    public function deleteFun(){
        $this->load->Model('Funs_m');
        $data = $this->Funs_m->delete_fun();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='funs_getfuns';
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
