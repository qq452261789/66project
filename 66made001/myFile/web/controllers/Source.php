<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source extends MY_Controller {
    /**
     * Controller
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


    /**
     * Controller
     * 获取功能列表
     */
	public function getSource(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $typeid = $this->input->post('typeid');
            $this->load->Model('Source_m');
            if(!empty($typeid)){
                $data = $this->Source_m->get_source($typeid);
            }else{
                $data = $this->Source_m->get_source();
            }
            $backHtml = "";
            if(!empty($data)){
                foreach ($data as $v){
                    if($typeid==2){
                        $pic="static/images/movie.jpg";
                    }else if($typeid==3){
                        $pic="static/images/music.jpg";
                    }else{
                        $pic=$v->sourceurl;
                    }
                    $backHtml .= "<ul class='cell'><li><img src=".base_url($pic)." width='120' height='120'></li><li>$v->sourcename</li><li><a href=".site_url('Source/updateSource?id='.$v->id).">编辑</a> <a href=".site_url('Source/deleteSource?id='.$v->id).">删除</a></li></ul>";
                }
            }else{
                $backHtml= "<p></p>";
            }
            echo $backHtml;
        }else{
            $this->load->Model('Source_m');
            $data = $this->Source_m->get_source(1);
            $backHtml= "";
            if(!empty($data)){
                foreach ($data as $v){
                    $backHtml .= "<ul class='cell'><li><img src=".base_url($v->sourceurl)." width='120' height='120'></li><li>$v->sourcename</li><li><a href=".site_url('Source/updateSource?id='.$v->id).">编辑</a> <a href=".site_url('Source/deleteSource?id='.$v->id).">删除</a></li></ul>";
                }
            }
            $data['pic'] = $backHtml;

            $this->load->view('source/list',$data);
        }
	}

    /**
     * Controller
     * 素材上传
     */
	public function addSource(){
	    $todo = $this->input->post('todo');
        if($todo=='save'){
            //获取当前用户
            $user = json_decode($_COOKIE['user'],true);
            $username = $user['username'];
            $pic = array('jpg','png','bmp','gif');//type of picture
            $vid = array('mp4','webm','swf');//type of video
            $mus = array('mp3','avi','zip');//type of music
            //为当前用户创建自己的素材目录
            if (!file_exists("uploads/".$username)) mkdir("uploads/".$username, 0777);
            $doaction=$this->input->post('doaction');
            if($doaction=='ajaxUploadSomeImg'){
                $data=$this->input->post('data');
                $namestr=$this->input->post('namestr');
                if(empty($data)||empty($namestr)){
                    echo '-1';
                }
                $data=explode('<{src}>',$data);
                $namestr=explode('<{name}>',$namestr);
                $len=count($data);
                for($i=0;$i<$len;$i++){
                    if(empty($data[$i])){ continue;}
                    $fname=$namestr[$i];
                    //获取文件格式并判断合法性
                    $type = pathinfo($fname, PATHINFO_EXTENSION);
                    if(in_array($type,array_merge($pic,$vid,$mus))){
                        if(in_array($type,$pic)){$sourcetypeid = 1;}
                        if(in_array($type,$vid)){$sourcetypeid = 2;}
                        if(in_array($type,$mus)){$sourcetypeid = 3;}
                    }else{
                        echo "<div style='margin: 10px;color:red;'>.".$type.' 格式不支持!</div>';
                        return;
                    }
                    $fdata=explode("base64,",$data[$i]);
                    $fdata=$fdata[1];
                    $path = "uploads/".$username."/".$fname;
                    //获取素材基本信息
                    //$sourcename = basename($fname,".".$type);//去掉后缀名
                    $sourcename = basename($fname);//保留后缀名
                    $size = $this->input->post('size');
                    //把素材内容写入到相应的文件
                    $rs=file_put_contents($path,base64_decode($fdata));
                    if($rs){
                        //获取文件md5码
                        $sourcemd5 = md5_file($path);
                        //把图片保存到数据库
                        $this->load->Model('Source_m');
                        $data = $this->Source_m->add_source($path,$sourcename,$sourcetypeid,$size,$sourcemd5);
                        if($data==1){
                            echo "<div style='margin: 10px;color:#191;'>".$fname.' 上传成功!</div>';
                        }else if($data==2){
                            unlink($path);
                            echo "<div style='margin: 10px;color:gold;'>素材已经存在！</div>";
                        }else{
                            unlink($path);
                            echo "<div style='margin: 10px;color:red;'>素材保存失败！</div>";
                        }
                    }else{
                        echo "<div style='margin: 10px;color:red;'>".$sourcename.'文件不合法!</div>';
                        return;
                    }
                }
            }
        }else{
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_sourcetypes();

            $this->load->view('source/add',$data);
        }
    }

    /**
     * Controller
     * 修改功能
     */
    public function updateSource(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $user = json_decode($_COOKIE['user'],true);
            $username = $user['username'];
            $config['upload_path']          = './uploads/'.$username.'/';
            $config['allowed_types']        = 'gif|jpg|png|avi|mp4|mpg|mpeg|mp3';
            $config['max_size']             = 20480;
            $config['max_width']            = 1440;
            $config['max_height']           = 900;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile')){
                $error = array('error' => $this->upload->display_errors());
                echo "上传错误！！";
                print_r($error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $this->load->Model('Source_m');
                //拆分图片地址
                $url = explode("/",$data['upload_data']['full_path']);
                //组合有效的图片链接
                $path = $url[4]."/".$url[5]."/".$url[6];
                //传参调用Model方法
                $data = $this->Source_m->update_source($path,$data['upload_data']['file_size']);
                if($data==1){
                    skips('getSource',"素材修改成功！");
                }else skips('addSource',"素材修改失败！");
            }
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Source_m');
            $re = $this->Source_m->get_source_by_id($id);
            $data['source'] = $re[0];
            $this->load->Model('Sourcetype_m');
            $data['list'] = $this->Sourcetype_m->get_sourcetypes();
            $this->load->view('source/update',$data);
        }
    }

    /**
     * Controller
     * 删除功能
     */
    public function deleteSource(){
        $this->load->Model('Source_m');
        $data = $this->Source_m->delete_source();
        if($data==1){
            skips('getSource', "删除成功！");
        }else{
            skips('getSource', "删除失败！");
        }
    }
}
