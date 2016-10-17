<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 14:33
 */

class Logins extends CI_Controller{
     /**
     * Controller
     * 跳转至登陆页面
     */
    public function login(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Login_m');
            $data = $this->Login_m->login();
            if($data==0){
                skips('register',"用户不存在,请先注册！");
            }
            if($data==1){
                skips(site_url('Uindex/index'),"登录成功！");
            }
            if($data==2){
                skips('login', "密码错误！");
            }
            if($data==3){
                skips('login', "账号已被禁用，请与管理员联系！");
            }
            if($data==4){
                skips('login',"账号已被删除，请与管理员联系！");
            }
        }else{
            if(!empty($_SESSION['user']) || !empty($_COOKIE['user'])){
                skips(site_url('Uindex/index'));
            }
            $this->load->view('logins/login');
        }
    }


    /**
     * Controller
     * 用户注册
     */
    public function register(){
        $todo = $this->input->post('todo');
        if($todo=='save'){
            $this->load->Model('Login_m');
            $data = $this->Login_m->register();
            if($data==0){
                skips('login', "注册成功！");
            }elseif($data==1){
                skips('register', "用户名或邮箱已注册！");
            }elseif ($data==3){
                skips('register', "验证码过期，刷新重试");
            }else{
                skips('register', "注册失败！");
            }
        }else{
            $this->load->view('logins/register');
        }
    }


    /**
     * Controller
     * 用户登出
     */
    public function logout(){
        unset($_SESSION['user']);
        setcookie('user','',time()-3600*24*365,base_url());
        skips(site_url('Indexs/index'));
    }

    /**
     * 生成验证码
     */
    public function yzm(){
        $this->load->helper('captcha');
        $vals = array(
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/'
        );

        $cap = create_captcha($vals);
        $data = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);

        echo $cap['image'];
    }

    /**
     * 检验验证码是否正确
     */
    public function checkyzm(){
        $expiration = time() - 120;
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count >0){
            echo 1;
        }
    }

    /**
     * Controller
     * 忘记密码
     */
    public function forgot(){
        $todo_1 = $this->input->post('todo_1');
        if($todo_1 == 'save_1'){
            $email = $this->input->post('email');
            $this->load->Model('Login_m');
            $re = $this->Login_m->set_password_by_email($email);
            if(count($re) == 0){
                skips(site_url('logins/forgot'),'该邮箱尚未注册');
            }else{
                $data['user'] = $re[0];
                $this->load->view('logins/reset_password',$data);
            }
        }elseif ($this->input->post('todo_2') == 'save_2'){
            $id = $this->input->post('email');   //实际上是该email 对应的id
            $pwd = $this->input->post('pwd');
            $this->load->Model('Login_m');
            $data = $this->Login_m->chenck_password($id,$pwd);
            if($data == 1){
                $arr['statusCode']=200;
                $arr['message']="操作成功";
                echo json_encode($arr);
            }else{
                $arr['statusCode']=300;
                $arr['message']="操作失败";
                echo json_encode($arr);
            }
        } else{
            $this->load->view('logins/forgot');
        }
    }

    /**
     * Controllers
     * 选择找回密码方式
     */
    public function find_password(){
        $this->load->view('logins/find_password');
    }

}