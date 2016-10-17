<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:25
 */

class Rights extends MY_Controller{

    /**
     * Controller
     * 权限列表
     */
    public function index(){
        $roleid = $this->input->get('roleid');
        $this->load->Model('Rights_m');
        $data['roleid'] = $roleid;
        $data['list'] = $this->Rights_m->get_rights_by_role($roleid);
        $this->load->Model('Funs_m');
        $re = $this->Funs_m->get_ffuns();
        $data['funs'] = $re;

        $this->load->view('rights/index',$data);
    }

    /**
     * Controller
     * 添加权限
     */
    public function addRight(){
        $this->load->Model('Rights_m');
        $data = $this->Rights_m->add_right();
        $arr['rel']='';
        $arr['forwardUrl']='';
        $arr['callbackType']="";
        $arr['navTabId']='role_fun';
        $arr['statusCode']=300;
        if($data==0){
            $arr['statusCode']=200;
            $arr['message']="添加成功";
        }elseif($data==1){
            $arr['message']="权限已存在";
        }else{
            $arr['message']="添加成功";
        }
        echo json_encode($arr);
    }


    /**
     * Controller
     * 删除用户
     */
    public function deleteRight(){
        $this->load->Model('Rights_m');
        $data = $this->Rights_m->delete_right();
        $arr['navTabId']='role_fun';
        $arr['callbackType']="";
        $arr['rel']='';
        $arr['forwardUrl']='';
        $arr['statusCode']=300;
        if($data==0){
            $arr['statusCode']=200;
            $arr['message']="删除成功";
        }else{
            $arr['message']="删除失败";
        }
        echo json_encode($arr);
    }

}