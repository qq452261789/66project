<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-21 14:04
 */
class Sources_m extends CI_Model{

    const WEB_SOURCE = 'source';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Model
     * 获取素材表信息列表
     */
    public function get_sources(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from WEB_SOURCE limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('WEB_SOURCE');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }

    /**
     * Model
     * 删除素材
     */
    public function delete_sources(){
        $id = $this->input->get('id');
        $query = $this->db->query("select sourceurl from WEB_SOURCE where id=".$id);
        $old = $query->result();
        if($this->db->delete('WEB_SOURCE',array('id'=>$id))){
            //删除素材文件
            if(is_file($old[0]->sourceurl)){
                unlink($old[0]->sourceurl);
            }
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 据id获取指定的素材
     */
    public function get_source_by_id($id){
        $query = $this->db->query("select * from WEB_SOURCE where id=".$id);
        $source = $query->result();
        return $source[0];
    }

    /**
     * Model
     * 更改素材为正常状态
     */
    public function update_sources($a){
        $id = $this->input->get('id');
        $data['state'] = $a;
        if($this->db->update('WEB_SOURCE',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}

?>