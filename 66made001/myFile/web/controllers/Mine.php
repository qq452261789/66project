<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mine extends MY_Controller {

    /**
     * Controller
     * 获取用户详情
     */
	public function detail(){
	    $id = $_SESSION['user']['id'];
        $this->load->Model('Mine_m');
        $re = $this->Mine_m->get_user_by_id($id);
        $data['mine'] = $re[0];
        $this->load->view('mine/detail',$data);
	}

    /**
     * Controller
     * 修改用户信息
     */
    public function updateMine(){
        $todo = $this->input->post('todo');
        if($todo=='save'){

            $this->load->Model('Mine_m');
            $data = $this->Mine_m->update_mine();
            if($data==1){
                skips('detail', "修改成功！");
            }else{
                skips('detail', "修改失败！");
            }
        }else{
            $id = $this->input->get('id');
            $this->load->Model('Mine_m');
            $re = $this->Mine_m->get_user_by_id($id);
            $data['mine']=$re[0];
            $this->load->view('mine/update',$data);
        }
    }

}
