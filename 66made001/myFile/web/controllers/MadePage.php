<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 10:04
 */

class MadePage extends CI_Controller
{
    /**
     * Controller
     * 保存页面
     */
    public function savePage(){
        Header("Access-Control-Allow-Origin: * ");
        Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        $this->load->Model("MadePage_m");
        $data = $this->MadePage_m->addPage();

        echo json_encode($data);

        $re = array();
        if($data==1){
            $re['status'] = 200;
            $re['message'] = "操作成功";

            echo json_encode($re);
        }else{
            $re['status'] = 300;
            $re['message'] = "操作失败";

            echo json_encode($re);
        }

    }

    /**
     * Controller
     * 获取一个页面
     */
    public function getPage(){
        Header("Access-Control-Allow-Origin: * ");
        Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        $this->load->Model("MadePage_m");
        $data = $this->MadePage_m->getPage();

        if(!empty($data)){
            echo json_encode($data);
        }else{
            $re['status'] = 300;
            $re['message'] = "操作失败";
            $re['data'] = "error";
            echo json_encode($re);
        }
    }

    /**
     * Controller
     * 新增虚拟二级域名配置
     */
    public function modifyVhostConf(){
        $fh = fopen('E:/phpStudy/Apache/conf/vhosts.conf','a');
        $files = "\"D:\WWW\upload\"";
        $domain = "www.baidu.com";
        $word = "

<VirtualHost *:80>
    DocumentRoot files
    ServerName domain
    ServerAlias 
  <Directory files>
      Options FollowSymLinks ExecCGI
      AllowOverride All
      Order allow,deny
      Allow from all
      Require all granted
  </Directory>
</VirtualHost>";

        $word = str_replace('files',$files,$word);
        $word = str_replace('domain',$domain,$word);
        fwrite($fh, $word);
        fclose($fh);
    }

    /**
     * Controller
     * 上传素材
     */
    public function uploadFile(){
        Header("Access-Control-Allow-Origin: * ");
        Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        $files = array();
        if(!empty($_FILES['myfile'])){
            if(move_uploaded_file($_FILES['myfile']['tmp_name'],"uploads/".$_FILES['myfile']['name'])){
                $name = $_FILES['myfile']['name'];
                $url = "uploads/".$_FILES['myfile']['name'];
                $size = ($_FILES['myfile']['size']/1000);
                $emd5 = md5_file("uploads/".$_FILES['myfile']['name']);
                $imgurl = base_url("uploads/".$_FILES['myfile']['name']);

                $this->load->Model('Source_m');
                $data = $this->Source_m->adds_source($url,$name,1,$size,$emd5);
                if($data==1){
                    $files[0]['sourceurl'] = $imgurl;
                }else{
                    $files = $data;
                }
            }
        }else{
            $files = "";
        }
        echo json_encode($files);
    }

}