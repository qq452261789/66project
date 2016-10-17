<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 10:04
 */

class Mypage extends CI_Controller{
        // public function index(){
        //     $this->load->view("mypage/index");
        // }
        
        public function editpage(){
            $this->load->view("mypage/editpage");
        }

        // public function shouye(){
        //     $this->load->view("mypage/shouye");
        // }

        public function shouye(){
            $this->load->view("lib/shouye");
        }
        public function view(){
            $this->load->view("lib/view");
        }
        public function publish(){
            $this->load->view("lib/publish");
        }   

        public function index(){
            $this->load->view("66made/html/model-1/index");
        } 
        public function index_view(){
            $this->load->view("66made/html/model-1/index_view");
        } 
        public function index_publish(){
            $this->load->view("66made/html/model-1/index_publish");
        } 

        public function services(){
            $this->load->view("66made/html/model-1/services");
        } 
        public function services_view(){
            $this->load->view("66made/html/model-1/services_view");
        } 
        public function services_publish(){
            $this->load->view("66made/html/model-1/services_publish");
        } 


}