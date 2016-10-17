<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-21 14:04
 */
class SysSources_m extends CI_Model{

    const ADM_SOURCE = 'source';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Model
     * 获取素材表信息列表
     */
    public function get_sys_sources($type){
        $numPerPage = $this->input->post('numPerPage');
        $pageNum = $this->input->post('pageNum');
        if(empty($numPerPage)){
            $numPerPage = 35;
        }
        if(empty($pageNum)){
            $pageNum = 1;
        }
        $offset = ($pageNum-1)*$numPerPage;
        $query = $this->db->query("select * from ADM_SOURCE where sourcetypeid=".$type." limit ".$offset.",".$numPerPage);
        $data['list'] = $query->result();
        $data['page']['count'] = $this->db->count_all('ADM_SOURCE');
        $data['page']['numPerPage'] = $numPerPage;
        $data['page']['pageNum'] = $pageNum;

        return $data;
    }


    /**
     * Model
     * 添加素材
     */
    public function add_sys_sources(){
        $data = $this->input->post('data');
        if(is_array($data)){//多图片上传
            $a = array();
            $a['state'] = 1;
            $a['ishas'] = 1;
            foreach ($data['pics'] as $k=>$v){
                $v['created'] = time();
                $v['updated'] = time();
                $query = $this->db->query("select id from ADM_SOURCE where sourcemd5='".$v['sourcemd5']."' or sourcename='".$v['sourcename']."'" );
                if(empty($query->result())){
                    if(!$this->db->insert('ADM_SOURCE',$v)){//图片上传失败
                        $a['state'] = 0;
                        $a['errorid'][$k] = $k+1;
                    }
                }else{//图片已经存在
                    $a['ishas'] = 0;
                    $a['hasid'][$k] = $k+1;
                }
            }
            return $a;
        }else{//单文件添加
            if($this->db->insert('ADM_SOURCE',$data)){
                return 1;
            }
        }
    }

    /**
     * Model
     * 更改素材为正常状态
     */
    public function update_sys_sources($a){
        $id = $this->input->get('id');
        $data['state'] = $a;
        if($this->db->update('ADM_SOURCE',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除素材
     */
    public function delete_sys_sources(){
        $id = $this->input->get('id');
        $query = $this->db->query("select sourceurl from ADM_SOURCE where id=".$id);
        $old = $query->result();
        if($this->db->delete('ADM_SOURCE',array('id'=>$id))){
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
    public function get_sys_source_by_id($id){
        $query = $this->db->query("select * from ADM_SOURCE where id=".$id);
        $source = $query->result();
        return $source[0];
    }
}

?>