<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-28 16:02
 */
class Myemail extends CI_Controller{

/**
 * 邮箱验证
 */

    public function email(){
        $email = $this->input->post('email');
        //需要验证唯一性
        $this->load->Model('Login_m');
        $re = $this->Login_m->check($email);
        if($re[0]->id == null){
            //获取验证码
            $this->code($email,1);
        }else{
            $arr['statusCode']=300;
            $arr['message']="邮箱已注册";
            echo json_encode($arr);
        }

    }

//忘记密码>>找回密码
    public function check_email(){
        $email = $this->input->post('email');
        $this->load->Model('Login_m');
        $re = $this->Login_m->check($email);
        if($re===0){
            $arr['statusCode']=300;
            $arr['message']="邮箱尚未注册";
            echo json_encode($arr);
        }else{
            $this->code($email,2);
        }

    }

    public function code($email,$type=1){
        $this->load->Model('Email_m');
        $code = $this->Email_m->code($email,$type);

        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.163.com';
        $config['smtp_user'] = 'freemen66@163.com';
        $config['smtp_pass'] = '66made';
        $config['mailtype'] = 'html';
        $config['validate'] = true;
        $config['priority'] = 1;
        $config['crlf'] = "\r\n";
        $config['smtp_port'] = 25;
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);


        $this->email->from('freemen66@163.com', '66科技');
        $this->email->to($email);
//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');

        $this->email->subject('陆陆科技');
        $this->email->message('本次验证码是  （'.$code.'）  请在3分钟内输入');

        $this->email->send();
        echo $this->email->print_debugger();
    }
}