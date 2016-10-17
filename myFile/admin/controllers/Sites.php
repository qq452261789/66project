<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:25
 */

class Sites extends MY_Controller{

    /**
     * Controller
     * 网站列表
     */
    public function index(){
        $this->load->Model('Sites_m');
        $re = $this->Sites_m->get_sites();
        $data['list'] = $re['list'];
        $data['page'] = $re['page'];

        $this->load->view('sites/index',$data);

    }


    /**
     * Controller
     * 网站信息后台修改
     */
    public function updateSite(){
        $todo = $this->input->post('todo');
        if($todo == 'save'){
            $this->load->Model('Sites_m');
            $data = $this->Sites_m->update_site();
            $arr['rel'] = '';
            $arr['callbackType'] = '';
            $arr['forwardUrl'] = '';
            $arr['navTabId'] = "sites_index";
            $arr['statusCode'] = 300;
            if($data == 1 ){
                $arr['statusCode'] = 200;
                $arr['message'] = "操作成功";
                $arr['callbackType'] = 'closeCurrent';
            }else{
                $arr['message'] = "操作失败";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Sites_m');
            $site = $this->Sites_m->get_site_by_id($id);
            $data['site'] = $site[0];

            $this->load->view('sites/update',$data);
        }
    }
}