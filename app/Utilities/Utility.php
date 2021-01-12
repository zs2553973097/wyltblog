<?php

namespace App\Utilities;

class Utility {
    /**
     * 通用工具类
     */

    /**
     * 生成随机字符串，默认数字字母混合
     * $numeric==0纯数字
     */
    public static function getRandStr($length = 6, $numeric = 1) {
        if (!$numeric) {
            //纯数字
            $str = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
        } else {
            //数字、字母组合
            $str = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $str .= $chars[mt_rand(0, $max)];
            }
        }
        return $str;
    }
    
    public static function delImage($data, $bill){
        $pattern = "/<img src=\"(.+?)\"/";
        $host = $_SERVER["HTTP_HOST"];
        $delImgArr = [];
        if($data!=""&&preg_match_all($pattern, $data, $matches)){
            
            $arrRes = $matches[1];
            $count = count($arrRes);
            if($bill!=""){
                $arrRes[$count] = "http://".$host."/".$bill;
            }
            foreach ($arrRes as $v){
                if(strripos($v, $host)!=false){
                    //开始删除图片文件
                    $dir = base_path();
                    $dir = str_replace("\\", "/", $dir);
                    $dir = $dir."/public";
                    $offset = strlen($host);
                    $start = stripos($v, $host);
                    $start = $start+$offset;
                    $path = substr($v, $start);
                    $filename = $dir.$path;
                    
                    try{
                        if(file_exists($filename)&&unlink($filename)){
                            $delImgArr[] = $v;
                        }
                    }
                    catch(Exception $e){
                        //print $e->getMessage();
                    }
                }
            }
            return $delImgArr;
        }else{
            if($bill!=""){
                $v = "http://".$host."/".$bill;
                if(strripos($v, $host)!=false){
                    //开始删除图片文件
                    $dir = base_path();
                    $dir = str_replace("\\", "/", $dir);
                    $dir = $dir."/public";
                    $offset = strlen($host);
                    $start = stripos($v, $host);
                    $start = $start+$offset;
                    $path = substr($v, $start);
                    $filename = $dir.$path;
                    
                    try{
                        if(file_exists($filename)&&unlink($filename)){
                            $delImgArr[] = $v;
                        }
                    }
                    catch(Exception $e){
                        //print $e->getMessage();
                    }
                }
                return $delImgArr;
            }
            
            return true;
        }
    }

}
