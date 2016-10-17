<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-21 11:53
 */
class Sources extends MY_Controller{

    /**
     * Controller
     * 素材列表
     */
    public function index(){
        $this->load->Model('Sources_m');
        $re = $this->Sources_m->get_sources();
        $sources = $re['list'];
        $this->load->Model('Users_m');
        $this->load->Model('Sourcetype_m');
        foreach($sources as $k => $v){
            $user = $this->Users_m->get_user_by_id($v->ownerid);
            $type = $this->Sourcetype_m->get_sourcetype_by_id($v->sourcetypeid);
            $sources[$k]->username = $user[0]->username;
            $sources[$k]->sourcetype = $type[0]->sourcetype;
        }
        $data['list'] = $sources;
        $data['page'] = $re['page'];

        $this->load->view('sources/index',$data);
    }

    /**
     * Controller
     * 删除素材
     */
    public function deleteSources(){
        $this->load->Model('Sources_m');
        $data = $this->Sources_m->delete_sources();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='sources_index';
        $arr['statusCode']=300;
        if($data==1){
            $arr['statusCode']=200;
            $arr['message']="操作成功";
        }else{
            $arr['message']="操作失败";
        }
        echo json_encode($arr);
    }

    /**
     * Controller
     * 更改素材状态
     */
    public function updateSources(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='sources_index';
            $arr['statusCode']=300;
            $this->load->Model('Sources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->Sources_m->delete_sources();
                }
                if($act=='upd'){
                    $data = $this->Sources_m->update_sources(1);
                }
                if($act=='ok'){
                    $data = $this->Sources_m->update_sources(0);
                }
            }else{
                $arr['message']="操作失败";
            }
            if($data==1){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
            }else{
                $arr['message']="操作失败";
            }
            echo json_encode($arr);
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Sources_m');
            $data['source'] = $this->Sources_m->get_source_by_id($id);

            $this->load->view("sources/update",$data);
        }
    }
}

?>