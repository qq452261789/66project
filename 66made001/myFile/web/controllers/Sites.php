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
     * 用户网站列表
     */
    public function index(){
        $this->load->Model('Sites_m');
        $data['list'] = $this->Sites_m->get_sites();
        $this->load->view('sites/index',$data);
    }

    /**
     * Controller
     * 添加用户
     */
    public function addSites(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Sites_m');
            $data = $this->Sites_m->add_site();
            if($data==0){
                skips('index', "添加成功！");
            }elseif($data==1){
                skips('addSites', "网站已经存在！");
            }else{
                skips('addSites', "添加失败！");
            }
        }else{
            $this->load->Model('Sitetype_m');
            $data['list'] = $this->Sitetype_m->get_sitetypes();
            $this->load->view('sites/add',$data);
        }
    }

    /**
     * Controller
     * 修改用户
     */
    public function updateSites(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Sites_m');
            $data = $this->Sites_m->update_site();
            if($data==1){
                skips('index', "修改成功！");
            }else{
                skips('updateSites', "修改失败！");
            }
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Sites_m');
            $site = $this->Sites_m->get_site_by_id($id);
            $data['site'] = $site[0];
            $this->load->Model('Sitetype_m');
            $data['list'] = $this->Sitetype_m->get_sitetypes();

            $this->load->view('sites/update',$data);
        }
    }

    /**
     * Controller
     * 删除用户
     */
    public function deleteSites(){
        $this->load->Model('Sites_m');
        $data = $this->Sites_m->delete_site();
        if($data==1){
            skips('index', "删除成功！");
        }else{
            skips('index', "删除失败！");
        }
    }

}