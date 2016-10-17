<?php

/**
 ** Created by PhpStorm.
 * Author :Administrator   Freemen
 * email  :freemen@66made.com  903944126@qq.com
 * Time    :2016-09-28 16:18
 */
class Email_m extends CI_Model{
        const WEB_CODE = 'code';
    /**
     *验证码
     */
    public function code($email,$type)
    {
        //注意：正式上线时，需要在服务器做一个定时任务，用于定时删除失效的记录
        $expiration = time() - 10*60;
        $this->db->where('created < ', $expiration)
            ->delete('web_code');

        $length = 6;
        $str = substr(md5(time()), 0, $length);
        //验证码写进数据库
        $data['code'] = $str;
        $data['created'] = time();
        $data['email'] = $email;
        $data['type'] = $type;  //1:表示注册类型

        if ($this->db->insert('WEB_CODE', $data)) {
            return $str;
        }
        return $str;
    }


}