<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class Source_m extends CI_Model{
    const WEB_SOURCE = 'source';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取素材信息
     */
    public function get_source_by_id($id){
        $query = $this->db->query("select * from WEB_SOURCE where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 获取用户素材列表
     */
    public function get_source($sourcetypeid=""){
        if(!empty($sourcetypeid)){
            $query = $this->db->query("select * from WEB_SOURCE where ownerid=".$_SESSION['user']['id']." and sourcetypeid=".$sourcetypeid);
        }else{
            $query = $this->db->query("select * from WEB_SOURCE where ownerid=".$_SESSION['user']['id']);
        }
        return $query->result();
    }

    /**
     * Model
     * 添加功能
     */
    public function add_source($url,$sourcename,$sourcetypeid,$size,$sourcemd5){
        $data = array();
        $data['sourcename'] = $sourcename;
        $data['sourcetypeid'] = $sourcetypeid;
        $data['sourceurl'] = $url;
        $data['sourcesize'] = $size;
        $data['sourcemd5'] = $sourcemd5;
        $data['created'] = time();
        $data['updated'] = time();
        if(!empty($_SESSION['user'])){
            $data['ownerid'] = $_SESSION['user']['id'];
        }else{
            $data['ownerid'] = 0;
        }

        $query = $this->db->query("select id from WEB_SOURCE where ownerid=".$_SESSION['user']['id']." and (sourcemd5='".$data['sourcemd5']."' or sourcename='".$data['sourcename']."')");
        if(!empty($query->result())){
            return 2;
        }
        if($this->db->insert('WEB_SOURCE',$data)){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 添加一张新图片
     */
    public function adds_source($url,$sourcename,$sourcetypeid,$size,$sourcemd5){
        $data = array();
        $data['sourcename'] = $sourcename;
        $data['sourcetypeid'] = $sourcetypeid;
        $data['sourceurl'] = $url;
        $data['sourcesize'] = $size;
        $data['sourcemd5'] = $sourcemd5;
        $data['created'] = time();
        $data['updated'] = time();
        $data['ownerid'] = 0;

        $query = $this->db->query("select sourceurl from WEB_SOURCE where sourcemd5='".$data['sourcemd5']."' or sourcename='".$data['sourcename']."'");
        if(!empty($re = $query->result())){
            return $re;
        }
        if($this->db->insert('WEB_SOURCE',$data)){
            return 1;
        }
    }

    /**
     * Model
     * 修改功能
     */
    public function update_source($url,$size){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['sourceurl'] = $url;
        $data['sourcesize'] = $size;
        $data['updated'] = time();
        $data['ownerid'] = $_SESSION['user']['id'];
        //删除素材旧文件
        $query = $this->db->query("select sourceurl from WEB_SOURCE where id=".$id);
        $old = $query->result();
        unlink($old[0]->sourceurl);
        //修改新素材的信息
        if($this->db->update('WEB_SOURCE',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除功能
     */
    public function delete_source(){
        $id = $this->input->get('id');
        $query = $this->db->query("select sourceurl from WEB_SOURCE where id=".$id);
        $old = $query->result();
        if($this->db->delete('WEB_SOURCE',array('id'=>$id))){
            //删除素材文件
            unlink($old[0]->sourceurl);
            return 1;
        }
        return 0;
    }
}