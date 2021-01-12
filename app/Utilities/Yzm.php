<?php
namespace App\Utilities;
class Yzm{
    private $type;
    public function __construct($type=1){
        //echo "construct";exit();
        $this->type = $type;
        
    }

    public function getYzm($random){
        $w = 120; //设置图片宽和高
        $h = 36;
        $str = Array(); //用来存储随机码
        //$string = "ABCDEFGHJKMNPQRSTUVWXYZ23456789";//随机挑选其中4个字符，也可以选择更多，注意循环的时候加上，宽度适当调整
        $string = "123456789";
        $vcode = "";
        for($i = 0;$i < 4;$i++){
           $str[$i] = $string[rand(0,8)];
           $vcode .= $str[$i];
        }
        /*
        if($random!=null&&$this->type==3){
            $vcode = $random;
        }else{
            $vcode = strtolower($vcode);
        }
        */
        $vcode = strtolower($vcode);
        //echo "type:".$this->type;exit();
        if($this->type==1){
            session(["userYzm"=>$vcode]);
            //echo ("zwp".session("userYzm"));exit();
        }
        if($this->type==2){
            session(["adminYzm"=>$vcode]);
            //echo ("zwp".session("userYzm"));
            //exit();
        }
        if($this->type==3){
            session(["loginYzm"=>$vcode]);
        }
        //session()->save();
        
        
        
        //return $vcode;
        //Session::put("yzm",$vcode);
        /*
        session(["yzm"=>$vcode]);
        session()->save();
        */
        
        /*
        session_start(); //启用超全局变量session
        $_SESSION["vcode"] = $vcode;
        */
        $im = imagecreatetruecolor($w,$h);
        $white = imagecolorallocate($im,255,255,255); //第一次调用设置背景色
        //$black = imagecolorallocate($im,0,0,0); //边框颜色
        imagefilledrectangle($im,0,0,$w,$h,$white); //画一矩形填充
        //imagerectangle($im,0,0,$w-1,$h-1,$black); //画一矩形框
        //生成雪花背景
        for($i = 1;$i < 200;$i++){ 
           $x = mt_rand(1,$w-9);
           $y = mt_rand(1,$h-9);
           $color = imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
           imagechar($im,1,$x,$y,"*",$color);
        }
        //将验证码写入图案
        /*
        for($i = 0;$i < count($vcode);$i++){
           $x = 13 + $i * ($w - 15)/4;
           $y = mt_rand(3,$h / 3);
           $color = imagecolorallocate($im,mt_rand(0,225),mt_rand(0,150),mt_rand(0,225));
           imagechar($im,5,$x,$y,$vcode[$i],$color);
        }*/
        $color = imagecolorallocate($im,mt_rand(0,225),mt_rand(0,150),mt_rand(0,225));
        //imagestring($im, 5, 20, 5, $vcode, $color);
        //$font = "./simhei.ttf";
        
        $dir = __DIR__;
        $dir = str_replace("\\", "/", $dir);
        $font = $dir."/simhei.ttf";
        imagestring($im, 24, 40, 10, $vcode, $color);
        //imagettftext($im, 20, 0, 11, 21, $color, $font, $vcode);
        header("Content-type:image/jpeg"); //以jpeg格式输出，注意上面不能输出任何字符，否则出错
        ob_clean();
        imagejpeg($im);
        imagedestroy($im);
        //exit();
        
    }
}