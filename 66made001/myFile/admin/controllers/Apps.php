<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-25 15:18
 */
class Apps extends MY_Controller{

    /**
     * Controller
     * 应用列表
     */
    public function index(){
        $this->load->Model('Apps_m');
        $re = $this->Apps_m->get_apps();
        $apps = $re['list'];
        $data['list'] = $apps;
        $data['page'] = $re['page'];
        $this->load->view('apps/index',$data);
    }

    /**
     * Controller
     * 添加应用(上传?)
     */
    public function addApp(){
        if($this->input->post('todo')=='save'){
            $this->load->Model('Apps_m');
            $data = $this->Apps_m->add_app();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            if($data==0){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['navTabId']='apps_index';
                $arr['callbackType']="closeCurrent";
                echo json_encode($arr);
            }elseif($data == 2){
                $arr['statusCode']=300;
                $arr['message']="价格请输出数值";
                $arr['navTabId']='';
                echo json_encode($arr);
            }else{
                $arr['statusCode']=300;
                $arr['message']="操作失败";
                $arr['navTabId']='';
                echo json_encode($arr);
            }
        }else{
            $this->load->view('apps/add');
        }
    }



    /**
     * Controller
     * 修改
     */
    public function updateApp(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Apps_m');
            $data = $this->Apps_m->update_app();
            $arr['rel']='';
            $arr['callbackType']="";
            $arr['forwardUrl']='';
            if($data == 0){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                $arr['navTabId']='apps_index';
                $arr['callbackType']="closeCurrent";
                echo json_encode($arr);
            }elseif($data == 2) {
                $arr['statusCode'] = 300;
                $arr['message'] = "价格请输入数值";
                $arr['navTabId'] = '';
                echo json_encode($arr);
            }elseif($data == 3) {
                $arr['statusCode'] = 300;
                $arr['message'] = "应用已被删除，无法修改";
                $arr['navTabId'] = '';
                echo json_encode($arr);
            }else{
                $arr['statusCode']=300;
                $arr['message']="操作失败";
                $arr['navTabId']='';
                echo json_encode($arr);
            }
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Apps_m');
            $app = $this->Apps_m->get_app_by_id($id);
            $data['app'] = $app[0];
            $this->load->view('apps/update',$data);
        }

    }


    /**
     * Controller
     * 删除
     */
    public function deleteApp(){
        $this->load->Model('Apps_m');
        $data = $this->Apps_m->delete_app();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="操作成功";
            $arr['navTabId']='apps_index';
            echo json_encode($arr);
        }else{
            $arr['statusCode']=300;
            $arr['message']="操作失败";
            $arr['navTabId']='';
            echo json_encode($arr);
        }
    }
}