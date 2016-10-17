<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 9:31
 */
class Rights_m extends CI_Model
{
    const ADM_ACT = 'act';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Models
     * 获取某个角色的权限
     */
    public function get_rights_by_role($id){
        $query = $this->db->query("select funid from ADM_ACT where roleid=".$id);
        $data = $query->result();
        foreach ($data as $v => $k){
            $query1 = $this->db->query("select * from `adm_fun` where id=".$k->funid);
            $fun = $query1->result();
            $data[$v]->funname = $fun[0]->funname;
        }
        return $data;
    }

    /**
     * Models
     * 获取某个角色的权限菜单
     */
    public function get_all_rights_by_role($id){
        $query = $this->db->query("select funid from ADM_ACT where roleid=".$id);
        $re = $query->result();

        $query1 = $this->db->query("select * from `adm_fun` where fid=0 and contrl='#' and funcs='#' and isnav=1 ORDER BY id DESC");
        $re1 = $query1->result();

        foreach ($re1 as $m => $n){
            foreach ($re as $v => $k){
                $query2 = $this->db->query("select id,funname,contrl,funcs,isnav,fid from `adm_fun` where deleted is NULL and isnav=1 and fid!=0 and id=".$k->funid);
                $fun = $query2->result();
                if(!empty($fun)){
                    if($fun[0]->fid==$n->id){
                        $re1[$m]->chid[] = $fun[0];
                    }
                }
            }
        }
        return $re1;
    }

    /**
     * Models
     * 获取所有菜单
     */
    public function get_all_rights(){
        $query = $this->db->query("select * from `adm_fun` where fid=0 and contrl='#' and funcs='#' and isnav=1 ORDER BY id DESC");
        $re = $query->result();

        foreach ($re as $k => $v){
            $query1 = $this->db->query("select id,funname,contrl,funcs,isnav,fid from `adm_fun` where deleted is NULL and isnav=1 and fid=".$v->id);
            $fun = $query1->result();
            if(!empty($fun)){
                $re[$k]->chid = $fun;
            }
        }
        return $re;
    }

     /**
     * Models
     * 获取符合条件的权限
     */
    public function get_right_id($rcond){
        $query = $this->db->query("select id from ADM_ACT where ".$rcond);
        $data = $query->result();

        return $data;
    }

    /**
     * Models
     * 为某个角色添加某个权限
     */
    public function add_right(){
        $data['roleid'] = $this->input->post('roleid');
        $data['funid'] = $this->input->post('funid');
        $sql = $this->db->query("select funid from ADM_ACT where roleid=".$data['roleid']." and funid=".$data['funid']);
        if(!empty($sql->result())){
            return 1;
        }
        if($this->db->insert('ADM_ACT',$data)){
            return 0;
        }
    }

    /**
     * Models
     * 删除某个角色的某个权限
     */
    public function delete_right(){
        $data['roleid'] = $this->input->post('roleid');
        $data['funid'] = $this->input->post('funid');
        if($this->db->delete("ADM_ACT",$data)){
            return 0;
        }
    }
}

?>