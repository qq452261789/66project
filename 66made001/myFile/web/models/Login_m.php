<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 15:14
 */

class Login_m extends CI_Model{
    const WEB_USER = 'user';
    const WEB_CODE = 'code';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Model
     * 根据id获取用户信息
     */
    public function get_user_by_id($id){
        $query = $this->db->query("select * from WEB_USER where id=".$id);
        return $query->result();
    }

    /**
     * Model
     * 根据id获取用户信息
     */
    public function get_user_by_name($name){
        $query = $this->db->query("select * from WEB_USER where username='".$name."'");
        return $query->result();
    }

    /**
     * Model
     * 用户登陆
     */
    public function login(){
        $inputs = $this->input->post('data');
//        $inputs['username'] =  mysql_real_escape_string($inputs['username']);
        $query = $this->db->query("select * from WEB_USER where username='".$inputs['username']."' or email='".$inputs['username']."' or phone='".$inputs['username']."' limit 0,1");
        $data = $query->result();
        if(!empty($data)){
            //账号被禁用
            if($data[0]->state==1){
                return 3;
            }
            //账号被删除
            if($data[0]->state==2){
                return 4;
            }
            //解密并对比密码
            if($data[0]->pwd == md5(md5($inputs['pwd']).SECRETKEY)){
                $rempwd = $this->input->post('rempwd');
                if(!empty($rempwd)){
                    $user = array();
                    $user['secretkey'] = $data[0]->pwd;
                    $user['pwd'] = md5(md5($data[0]->username.'123456').SECRETKEY);
                    $user['username'] = $data[0]->username;
                    $user = json_encode($user);
                    setcookie('user',$user,time()+3600*24*365,base_url());
                }else{
                    $_SESSION['user']['id'] = $data[0]->id;
                    $_SESSION['user']['username'] = $data[0]->username;
                    $_SESSION['user']['email'] = $data[0]->email;
                    $_SESSION['user']['phone'] = $data[0]->phone;
                }
                //登陆成功
                return 1;
            }else{
                //密码错误
                return 2;
            }
            //用户名不存在
            return 0;
        }
    }


    /**
     * Model
     * 用户注册
     */
    public function register(){
        $data = $this->input->post('data');
        //验证邮箱验证码是否有效（检查前3分钟内的所有记录寻找出符合的则通过验证）
        $time = time()-3*60;
        $type = 1;//验证注册类型
        $query = $this->db->query("select * from WEB_CODE where email ='".$data['email']."' and code='".$data['code']."' and created >'".$time."' and type ='".$type."'");
        $result = $query->result();
        if(!empty($result)){
            //密码加密
            $data['pwd'] = md5(md5($data['pwd']).SECRETKEY);
            $data['created'] = time();
            $data['updated'] = time();
            $regvip = $this->input->post('regvip');
            if(!empty($regvip)){
                $data['type'] = 2;
            }
            foreach ($data as $key=>$value)
            {
                if ($value === 'code')
                    unset($data[$key]);
            }
            $query = $this->db->query("select * from WEB_USER where username='".$data['username']."' or email='".$data['email']."' limit 0,1");
            $result = $query->result();
            if(!empty($result)){
                //用户名和邮箱已经注册
                return 1;
            }
            if($this->db->insert('WEB_USER', $data)){
                //注册成功
                return 0;
            }
        }
        //注册失败
        return 2;

    }

    /**
     * Model
     * 根据邮箱更改用户信息（实际在上线时需要运用邮箱（验证码或url）验证）
     */
    public function set_password_by_email($email){
        $data = $this->input->post('data');
        //验证邮箱验证码是否有效（检查前3分钟内的所有记录寻找出符合的则通过验证）
        $time = time()-3*60;
        $type = 2;//2:忘记密码类型
        $query = $this->db->query("select * from WEB_CODE where email ='".$email."' and code='".$data['code']."' and created >'".$time."' and type ='".$type."'");
        $result = $query->result();
        if(!empty($result)){
            $query = $this->db->query("select id from WEB_USER where email='".$email."'");
            if(!empty($query)){
                $result = $query->result();
                return $result;
            }else{
                return 0;
            }
        }else{
            return 1;
        }
    }


    /**
     * Model
     *
     */
    public function check($email){
        $query = $this->db->query("select * from WEB_USER where email='".$email."'");
        $data = $query->result();
        if(!empty($data)){

            return $data[0];
        }
        return 0;
    }


    /**
     * Model
     * 验证两次密码一致
     */
    public function chenck_password($id,$password){
        if(!empty($id) && !empty($password)){
            $data['pwd'] = md5(md5($password).SECRETKEY);
            $data['updated'] = time();
            if($this->db->update('WEB_USER',$data,array('id'=>$id))){
                return 1;
            }else{
                return -1;
            }
        }else{
            return 0;
        }
    }
}