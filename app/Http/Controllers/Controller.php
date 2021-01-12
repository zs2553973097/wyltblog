<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Utilities\Utility;
use App\Models\UsersAccess;

class Controller extends BaseController {

    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function apiToJson($data, $code, $count){
        $msg = "返回错误";
        switch ($code){
            case 200:
                $msg = "返回数据正确";
                break;
            default:
                break;
        }
        $value = [
            "code" => $code,
            "msg" => $msg,
            "count" => $count,
            "data" => $data
        ];
        return json_encode($value);
        
    }


    public function toJson($data, $code) {
        $msg = "返回错误";
        switch ($code) {
            case 200:
                $msg = "返回数据正确";
                break;
            case 1:
                $msg = "返回数据空";
                break;
            case 2:
                $msg = "提交方式不为post";
                break;
            case 3:
                $msg = "用户名长度必须不为空且小于30个字符";
                break;
            case 4:
                $msg = "密码长度必须不小于6，不大于16";
                break;
            case 5:
                $msg = "验证码错误";
                break;
            case 6:
                $msg = "用户名或密码错误， 或者审核未通过";
                break;
            case 7:
                $msg = "写入登录token失败";
                break;
            case 8:
                $msg = "添加文章成功";
                break;
            case 9:
                $msg = "添加文章失败";
                break;
            case 10:
                $msg = "图片大小超过4M";
                break;
            case 11:
                $msg = "返回数据错误";
                break;
            case 12:
                $msg = "更新文章成功";
                break;
            case 13:
                $msg = "更新文章失败";
                break;
            case 14:
                $msg = "删除图片成功";
                break;
            case 15:
                $msg = "删除图片失败";
                break;
            case 16:
                $msg = "退出登录成功";
                break;
            case 17:
                $msg = "退出登录失败";
                break;
            case 18:
                $msg = "更新用户信息成功";
                break;
            case 19:
                $msg = "更新用户信息失败";
                break;
            case 20:
                $msg = "删除文章成功";
                break;
            case 21:
                $msg = "删除文章失败";
                break;
            case 22:
                $msg = "更新分类名称成功";
                break;
            case 23:
                $msg = "更新分类名称失败";
                break;
            case 24:
                $msg = "添加分类名称成功";
                break;
            case 25:
                $msg = "添加分类名称失败";
                break;
            case 26:
                $msg = "添加子分类成功";
                break;
            case 27:
                $msg = "添加子分类失败";
                break;
            case 28:
                $msg = "删除分类成功";
                break;
            case 29:
                $msg = "删除分类失败";
                break;
            case 30:
                $msg = "子分类更新成功";
                break;
            case 31:
                $msg = "子分类更新失败";
                break;
            case 32:
                $msg = "删除子分类成功";
                break;
            case 33:
                $msg = "删除子分类失败";
                break;
            case 34:
                $msg = "首页图片发布成功";
                break;
            case 35:
                $msg = "首页图片发布失败";
                break;
            case 36:
                $msg = "首页图片编辑成功";
                break;
            case 37:
                $msg = "首页图片编辑失败";
                break;
            case 38:
                $msg = "用户密码修改成功";
                break;
            case 39:
                $msg = "用户密码修改失败";
                break;
            case 40:
                $msg = "密码长度必须>=6且<=16";
                break;
            case 41:
                $msg = "关于表内容操作成功";
                break;
            case 42:
                $msg = "关于表内容操作失败";
                break;
            case 43:
                $msg = "铭言修改成功";
                break;
            case 44:
                $msg = "铭言修改失败";
                break;
            case 45:
                $msg = "插入友链成功";
                break;
            case 46:
                $msg = "插入友链失败";
                break;
            case 47:
                $msg = "编辑友链成功";
                break;
            case 48:
                $msg = "编辑友链失败";
                break;
            case 49:
                $msg = "删除友链成功";
                break;
            case 50:
                $msg = "删除友链失败";
                break;
            case 51:
                $msg = "私密数据返回成功";
                break;
            case 52:
                $msg = "私密数据返回失败";
                break;
            default:
                break;
        }
        $value = [
            "data" => $data,
            "msg" => $msg,
            "code" => $code
        ];
        return json_encode($value);
    }

    public function tokenSet($uid, $time)
    {
        $model = new UsersAccess();
        $hasToken = $model->getToken($uid, $time);
        if($hasToken){
            return $hasToken;
        }
        $token = Utility::getRandStr(rand(60,80));
        $model->uid = $uid;
        $model->token = $token;
        $model->create_time = $time;
        $model->expire_time = $time + 24*60*60;
        $flag = $model->save();
        if($flag){
            return $token;
        }
        return null;
        
    }
    
    public function toJsonPic($data, $code){
        $msg = "返回错误";
        switch ($code) {
            case 0:
                $msg = "图片上传成功";
                break;
            case 1:
                $msg = "图片上传失败";
                break;
            
            default:
                break;
        }
        $value = [
            "data" => [$data],
            "msg" => $msg,
            "code" => $code
        ];
        return json_encode($value);
    }
}
