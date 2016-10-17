<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-21 16:15
 */
class SourceType_m extends CI_Model{

    const WEB_SOURCETYPE = 'sourcetype';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Model
     * 根据sourcetypeid获取sourcetype
     */
    public function get_sourcetype_by_id($sourcetypeid){
        $query = $this->db->query("select * from WEB_SOURCETYPE where id=".$sourcetypeid);
        return $query->result();
    }

    /**
     * Model
     * 分页获取素材类型列表
     */
    public function get_sourcetypes(){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from WEB_SOURCETYPE limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('WEB_SOURCETYPE');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }


    public function get_all_sourcetypes(){
        $query = $this->db->query("select * from WEB_SOURCETYPE where deleted is null");
        return $query->result();
    }

    /**
     * Model
     * 添加素材类型
     */
    public function add_sourcetype(){
       $data = $this->input->post('data');
       if(!empty($data)){
            if($this->db->insert('WEB_SOURCETYPE',$data)){
                return 1;
           }
       }else{
           return 0;
       }

    }

    /**
     * Model
     * 编辑素材类型
     */
    public function update_sourcetype(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        if($this->db->update('WEB_SOURCETYPE',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除素材类型
     */
    public function delete_sourcetype(){
        $id = $this->input->get('id');
        if($this->db->delete('WEB_SOURCETYPE',array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}

?>