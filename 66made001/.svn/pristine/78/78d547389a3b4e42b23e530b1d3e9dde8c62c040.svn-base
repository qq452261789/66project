<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 10:04
 */

class Indexs extends CI_Controller{
    /**
     * Controller
     * 默认主页
     */
    public function index(){
        if(!empty($_SESSION['user']) || !empty($_COOKIE['user'])){
            skips(site_url('Uindex/index'));
            return;
        }
        $this->load->view('index');
    }

    public function ftp(){

        $this->viewFile('E:/wamp64/www/66madesite', '66made');
    }

    public function getFileName($dir)
    {
        //PHP遍历文件夹下所有文件
        $handle = opendir($dir . ".");
        //定义用于存储文件名的数组
        $array_file = array();
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $array_file[] = $file; //输出文件名
            }
        }
        closedir($handle);
        return $array_file;
    }

//拷贝当前文件夹到新文件夹
   public function viewFile($oldfile,$newfile){
       $conn_id = ftp_connect('115.28.241.253');
       ftp_login($conn_id,'administrator','lei910626.');

        if(is_dir($oldfile)) {
            if (!file_exists($newfile)){
                ftp_mkdir($conn_id,$newfile);
            }else{
                ftp_mkdir($conn_id,$newfile);
        }
        }
        foreach($this->getFileName($oldfile) as $k){
            $file = $oldfile."/".$k;
            $files = $newfile."/".$k;
            if(is_dir($file)){
                $this->viewFile($file,$files);
            }else{
                $this->load->library('ftp');
                $config['hostname'] = '115.28.241.253';
                $config['username'] = 'administrator';
                $config['password'] = 'lei910626.';
                $config['debug']    = TRUE;

                $this->ftp->connect($config);

                $this->ftp->upload($file, $files, 0775);
            }
        }
    }

    
}