<?php
/**
 * Created by zfl.
 * Date: 2016/9/8
 * Time: 10:09
 * 用于拷贝当前文件夹的所有内容至另一个文件夹
 */
//遍历文件夹下所有文件，并返回所有文件名
function getFileName($dir)
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
function viewFile($oldfile,$newfile){
    if(is_dir($oldfile)) {
        if (!file_exists($newfile)) mkdir($newfile, 0777);
    }
    foreach(getFileName($oldfile) as $k){
        $file = $oldfile."/".$k;
        $files = $newfile."/".$k;
        if(is_dir($file)){
            viewFile($file,$files);
        }else{
            copy($file,$files);
        }
    }
}

$webs = dirname(__FILE__) . "/web";
$websc = dirname(__FILE__) . "/webC";
viewFile($webs, $websc);