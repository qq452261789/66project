<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 18:19
 */
class MadePage_m extends CI_Model
{
    const WEB_PAGES = 'pages';

    /**
     * Model
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Model
     * 获取一个模板页面
     */
    public function getPage(){
        $modsid = $this->input->get("modsid");
        $pageid = $this->input->get("pageid");

        $query = $this->db->query("select content from WEB_PAGES where modsid=".$modsid." and pageid=".$pageid);

        return $query->result();
    }

    /**
     * Model
     * 添加一个页面
     */
    public function addPage(){
        $data['modsid'] = $this->input->post("modsid");
        $data['content'] = $this->input->post("content");
        $data['title'] = $this->input->post("title");
        $data['pageid'] = $this->input->post("pageid");
        $data['created'] = time();
        $data['updated'] = time();

        if($this->db->insert("WEB_PAGES",$data)){
            return 1;
        }
        return 0;
    }

}

?>