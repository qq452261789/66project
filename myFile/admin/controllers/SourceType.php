<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-21 11:53
 */
class SourceType extends MY_Controller{

    /**
     * Controller
     * 素材类型列表
     */
    public function index(){
        $this->load->Model('SourceType_m');
        $re = $this->SourceType_m->get_sourcetypes();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('sourcetype/index',$data);
    }

    /**
     * Controller
     * 添加素材类型
     */
    public function addSourceType(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('SourceType_m');
            $data = $this->SourceType_m->add_sourcetype();
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='sourcetype_index';
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $this->load->view('sourcetype/add');
        }
    }

    /**
     * Controller
     * 修改素材类型
     */
    public function updateSourceType(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('SourceType_m');
            $data = $this->SourceType_m->update_sourcetype();
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='sourcetype_index';
            $arr['statusCode']=300;
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('SourceType_m');
            $re = $this->SourceType_m->get_sourcetype_by_id($id);
            $data['sourcetype'] = $re[0];

            $this->load->view("sourcetype/update",$data);
        }
    }

    /**
     * 删除素材类型
     */
    public function deleteSourceType(){
        $this->load->Model('SourceType_m');
        $data = $this->SourceType_m->delete_sourcetype();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='sourcetype_index';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="操作成功";
        }else{
            $arr['message']="操作失败";
        }
        echo json_encode($arr);
    }
}

?>