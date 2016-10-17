<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-26 15:24
 */
class SysSources extends MY_Controller{

    /**
     * Controller
     * 系统素材，图片列表
     */
    public function picIndex(){
        $type = 1;
        $this->load->Model('SysSources_m');
        $re = $this->SysSources_m->get_sys_sources($type);
        $SysSources = $re['list'];
        $this->load->Model('Sourcetype_m');
        foreach($SysSources as $k => $v){
            $type = $this->Sourcetype_m->get_sourcetype_by_id($v->sourcetypeid);
            $SysSources[$k]->sourcetype = $type[0]->sourcetype;
        }
        $data['list'] = $SysSources;
        $data['page'] = $re['page'];
        $data['addact'] = 'addPics';
        $data['updact'] = 'updatePics';
        $data['delact'] = 'deletePics';

        $this->load->view('syssources/index', $data);
    }


    /**
     * Controller
     * 系统素材，视频列表
     */
    public function vidIndex(){
        $type = 2;
        $this->load->Model('SysSources_m');
        $re = $this->SysSources_m->get_sys_sources($type);
        $SysSources = $re['list'];
        $this->load->Model('Sourcetype_m');
        foreach($SysSources as $k => $v){
            $type = $this->Sourcetype_m->get_sourcetype_by_id($v->sourcetypeid);
            $SysSources[$k]->sourcetype = $type[0]->sourcetype;
        }
        $data['list'] = $SysSources;
        $data['page'] = $re['page'];
        $data['addact'] = 'addVids';
        $data['updact'] = 'updateVids';
        $data['delact'] = 'deleteVids';

        $this->load->view('syssources/index',$data);
    }


    /**
     * Controller
     * 系统素材，音频列表
     */
    public function musIndex(){
        $type = 3;
        $this->load->Model('SysSources_m');
        $re = $this->SysSources_m->get_sys_sources($type);
        $SysSources = $re['list'];
        $this->load->Model('Sourcetype_m');
        foreach($SysSources as $k => $v){
            $type = $this->Sourcetype_m->get_sourcetype_by_id($v->sourcetypeid);
            $SysSources[$k]->sourcetype = $type[0]->sourcetype;
        }
        $data['list'] = $SysSources;
        $data['page'] = $re['page'];
        $data['addact'] = 'addMuss';
        $data['updact'] = 'updateMuss';
        $data['delact'] = 'deleteMuss';

        $this->load->view('syssources/index',$data);
    }

    /**
     * Controller
     * 删除素材 图片
     */
    public function deletePics(){
        $this->load->Model('SysSources_m');
        $data = $this->SysSources_m->delete_sys_sources();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='syssources_picindex';
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
     * 删除素材 视频
     */
    public function deleteVids(){
        $this->load->Model('SysSources_m');
        $data = $this->SysSources_m->delete_sys_sources();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='syssources_vidindex';
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
     * 删除素材 音频
     */
    public function deleteMuss(){
        $this->load->Model('SysSources_m');
        $data = $this->SysSources_m->delete_sys_sources();
        $arr['rel']='';
        $arr['callbackType']="";
        $arr['forwardUrl']='';
        $arr['navTabId']='syssources_vidindex';
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
     * 更改素材状态 图片
     */
    public function updatePics(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='SysSources_index';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->SysSources_m->update_sys_sources();
                }
                if($act=='upd'){
                    $data = $this->SysSources_m->update_sys_sources(1);
                }
                if($act=='ok'){
                    $data = $this->SysSources_m->update_sys_sources(0);
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
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_all_sourcetypes();
            $id = $this->input->get('id');
            $this->load->Model('SysSources_m');
            $data['source'] = $this->SysSources_m->get_sys_source_by_id($id);
            $data['action'] = 'updatePics';

            $this->load->view("syssources/update",$data);
        }
    }

    /**
     * Controller
     * 更改素材状态 视频
     */
    public function updateVids(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='SysSources_index';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->SysSources_m->update_sys_sources();
                }
                if($act=='upd'){
                    $data = $this->SysSources_m->update_sys_sources(1);
                }
                if($act=='ok'){
                    $data = $this->SysSources_m->update_sys_sources(0);
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
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_all_sourcetypes();
            $id = $this->input->get('id');
            $this->load->Model('SysSources_m');
            $data['source'] = $this->SysSources_m->get_sys_source_by_id($id);
            $data['action'] = 'updateVids';

            $this->load->view("syssources/update",$data);
        }
    }

    /**
     * Controller
     * 更改素材状态 音频
     */
    public function updateMuss(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='SysSources_index';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->SysSources_m->update_sys_sources();
                }
                if($act=='upd'){
                    $data = $this->SysSources_m->update_sys_sources(1);
                }
                if($act=='ok'){
                    $data = $this->SysSources_m->update_sys_sources(0);
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
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_all_sourcetypes();
            $id = $this->input->get('id');
            $this->load->Model('SysSources_m');
            $data['source'] = $this->SysSources_m->get_sys_source_by_id($id);
            $data['action'] = 'updateMuss';

            $this->load->view("syssources/update",$data);
        }
    }

    /**
     * Controller
     * 添加素材状态 图片
     */
    public function addPics(){
        $todo = $this->input->get('todo');
        if($todo=='upload'){//ajax多图片上传
            $files = array();
            if(!empty($_FILES['myfile'])){
                foreach ($_FILES['myfile']['name'] as $k=>$v){
                    if(!file_exists('uploads')){
                        mkdir('uploads');
                    }
                    if(move_uploaded_file($_FILES['myfile']['tmp_name'][$k],"uploads/".$v)){
                        $files[$k]['sourceurl'] = "uploads/".$v;
                        $files[$k]['sourcesize'] = ($_FILES['myfile']['size'][$k]/1000);
                        $files[$k]['sourcemd5'] = md5_file("uploads/".$v);
                        $files[$k]['imgurl'] = base_url("uploads/".$v);
                    }
                }
            }else{
                $files = "";
            }
            echo json_encode($files);
        }else if($todo=='save'){//保存图片信息
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='syssources_picindex';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $data = $this->SysSources_m->add_sys_sources();
            if($data['state']==1 && $data['ishas']==1){//图片全部上传成功
                $arr['statusCode']=200;
                $arr['message']="图片全部上传成功！";
            }else{
                $message = "";
                $re1 = "";
                $re2 = "";
                if(!empty($data['hasid'])){//部分图片已经存在
                    foreach ($data['hasid'] as $n) {
                        $re1 .= $n . " ";
                    }
                    $message .= "第".$re1."张图片已存在！";
                }
                if(!empty($data['errorid'])){//部分图片上传失败
                    foreach ($data['errorid'] as $n) {
                        $re2 .= $n . " ";
                    }
                    $message .= "第".$re2."张图片上传失败！";
                }
                $arr['message']= $message;
            }
            echo json_encode($arr);
        }else{//跳转到图片上传页面
            $this->load->view("syssources/addpics");
        }
    }

    /**
     * Controller
     * 添加素材状态 视频
     */
    public function addVids(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='SysSources_index';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->SysSources_m->add_sys_sources();
                }
                if($act=='upd'){
                    $data = $this->SysSources_m->add_sys_sources(1);
                }
                if($act=='ok'){
                    $data = $this->SysSources_m->add_sys_sources(0);
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
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_all_sourcetypes();
            $data['action'] = "addVids";
            $this->load->view("syssources/add", $data);
        }
    }


    /**
     * Controller
     * 添加素材状态 音频
     */
    public function addMuss(){
        $todo = $this->input->get('todo');
        if($todo=='save'){
            $arr['rel']='';
            $arr['callbackType']="closeCurrent";
            $arr['forwardUrl']='';
            $arr['navTabId']='SysSources_index';
            $arr['statusCode']=300;
            $this->load->Model('SysSources_m');
            $act = $this->input->get('act');
            if(!empty($act)){
                if($act=='del'){
                    $data = $this->SysSources_m->add_sys_sources();
                }
                if($act=='upd'){
                    $data = $this->SysSources_m->add_sys_sources(1);
                }
                if($act=='ok'){
                    $data = $this->SysSources_m->add_sys_sources(0);
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
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_all_sourcetypes();
            $data['action'] = "addMuss";

            $this->load->view("syssources/add",$data);
        }
    }

    /**
     * Controller
     * 上传素材
     */
    public function uploadFile(){
        $files = array();
        if(!empty($_FILES['myfile'])){
            if(!file_exists('uploads')){
                mkdir('uploads');
            }
            if(move_uploaded_file($_FILES['myfile']['tmp_name'],"uploads/".$_FILES['myfile']['name'])){
                $files['sourceurl'] = "uploads/".$_FILES['myfile']['name'];
                $files['sourcesize'] = ($_FILES['myfile']['size']/1000);
                $files['sourcemd5'] = md5_file("uploads/".$_FILES['myfile']['name']);
                $files['imgurl'] = base_url("uploads/".$_FILES['myfile']['name']);
            }
        }else{
            $files = "";
        }
        echo json_encode($files);
    }
}