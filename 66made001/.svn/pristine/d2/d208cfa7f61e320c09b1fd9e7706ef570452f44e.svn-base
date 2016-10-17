<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:26
 */

class Sites_m extends CI_Model{
    const SITE_SITES = 'sites';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 获取用户网站列表
     */
    public function get_site_by_id($id){
        $query = $this->db->query('select * from SITE_SITES where id='.$id);
        return $query->result();

    }

    /**
     * Model
     * 获取用户网站列表
     */
    public function get_sites(){
        $uid = $_SESSION['user']['id'];
        $query = $this->db->query('select * from SITE_SITES where ownerid='.$uid);
        return $query->result();

    }

    /**
     * Model
     * 添加一个用户网站
     */
    public function add_site(){
        $data = $this->input->post('data');
        $data['ownerid'] = $_SESSION['user']['id'];
        //如果用户添加了网站域名则该网站域名为此域名，否则域名为网站二级域名（用户英文名+网站域名）
        if(!empty($data['domain'])){
            $this->domain = $data['domain'];
        }else{
            $this->domain = $data['enname'].".66made.com";
        }
        $data['created'] = time();
        $data['updated'] = time();
        $data['sitefile'] = "sties/".$_SESSION['user']['username']."/".$data['enname'];
        $query = $this->db->query("select id from SITE_SITES where ownerid=".$data['ownerid']." and enname='".$data['enname']."'");
        if(!empty($query->result())){
            return 1;
        }
        if($this->db->insert('SITE_SITES',$data)){
            //生成网站的目录
            if (!file_exists($_SERVER['DOCUMENT_ROOT'].base_url().'sties'))
                mkdir($_SERVER['DOCUMENT_ROOT'].base_url().'sties', 0777);
            if (!file_exists($_SERVER['DOCUMENT_ROOT'].base_url().'sties/'.$_SESSION['user']['username']))
                mkdir($_SERVER['DOCUMENT_ROOT'].base_url().'sties/'.$_SESSION['user']['username'], 0777);
            if (!file_exists($_SERVER['DOCUMENT_ROOT'].base_url()."sties/".$_SESSION['user']['username']."/".$data['enname']))
                mkdir($_SERVER['DOCUMENT_ROOT'].base_url()."sties/".$_SESSION['user']['username']."/".$data['enname'], 0777);
            return 0;
        }
        return 2;
    }

    /**
     * Model
     * 修改用户信息
     */
    public function update_site(){
        $id = $this->input->post('id');
        $data = $this->input->post('data');
        $data['ownerid'] = $_SESSION['user']['id'];
        //如果用户添加了网站域名则该网站域名为此域名，否则域名为网站二级域名（用户英文名+网站域名）
        if(empty($data['domain'])){
            $data['domain'] = $data['enname'].".66made.com";
        }
        $data['updated'] = time();
        if($this->db->update('SITE_SITES',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }

    /**
     * Model
     * 删除用户
     */
    public function delete_site(){
        $id = $this->input->get('id');
        $data['updated'] = time();
        $data['sitestate'] = 2;

        if($this->db->update('SITE_SITES',$data,array('id'=>$id))){
            return 1;
        }
        return 0;
    }
}