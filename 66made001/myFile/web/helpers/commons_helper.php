<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 9:48
 */
function skips($link,$cont=null){
    if($_SERVER['REQUEST_URI']==$link){
        return;
    }
    if($cont!=null){
        echo '<script>alert("'.$cont.'");</script>';
        echo "<script>window.location.href='".$link."'</script>";
    }else{
        echo "<script>window.location.href='".$link."'</script>";
    }
}
