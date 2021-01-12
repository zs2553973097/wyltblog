<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\Yzm;
use App\Utilities\ValidData;
use App\Http\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
//date_default_timezone_set('Etc/GMT-8');

class AdminController extends Controller{
    protected $model;
    public function __construct() {
        $this->model = new AdminService();
        $id = session("uid")==null?null:session("uid");
        $userName = "";
        if($id!=null){
            $userInfoData = $this->model->getUserInfoByUid($id);
            if($userInfoData!=null){
                $userName = $userInfoData["name"];
            }
        }
        View::share("userName",$userName);
    }

    public function login(){
        return view("blogadmin.login");
    }
    
    public function getYzm($random=null){
        $model = new Yzm(3);
        $obj = $model->getYzm($random);
        return $obj;
    }
    
    public function doLogin(Request $request){
        if($request->isMethod("post")){
            $validModel = new ValidData();
            $name = $request->userName;
            $data = null;
            if(!$validModel->validAdminName($name)){
                return $this->toJson($data, 3);
            }
            $password = $request->password;
            if(!$validModel->validPassword($password)){
                return $this->toJson($data, 4);
            }
            $code = $request->code;
            if(!$validModel->validLoginYzm($code)){
                return $this->toJson($data, 5);
            }
            $userData = $this->model->doLogin($name, $password);
            if(!$userData){
                return $this->toJson($data, 6);
            }
            $uid = $userData->id;
            $time = time();
            $token = $this->tokenSet($uid, $time);
            if(!$token){
                return $this->toJson($data, 7);
            }
            session(["uid"=>$uid]);
            session(["token"=>$token]);
            $data["uid"] = $uid;
            $data["token"] = $token;
            
            return $this->toJson($data, 200);
        }
    }
    
    public function logout(Request $request){
        if($request->isMethod("post")){
            $sessionUid = session("uid");
            $sessionToken = session("token");
            $sessionUrl = session("url");
            if($sessionUid!=null&&$sessionToken!=null){
                $keys = ["uid","token","url"];
                session()->forget($keys);
            }
            return $this->toJson(null, 16);
        }
        return $this->toJson(null, 17);
    }
    
    public function index(Request $request, $uid, $token, $v=1){
        
        $id = intval($uid);
        $userInfoData = $this->model->getUserInfoByUid($id);
        $userName = "";
        if($userInfoData!=null){
            $userName = $userInfoData["name"];
        }
        $phpVersion = PHP_VERSION;
        $system = PHP_OS;
        $dataBaseVersion = DB::select("select version()");
        $dataBaseVersion = (array)($dataBaseVersion[0]);
        $dataBaseVersion = $dataBaseVersion["version()"];
        $upload_max_filesize = ini_get("upload_max_filesize");
        $num = 5;
        $articleData = $this->model->getContents($num);
        $url = url()->full();
        if(session("url")==null){
            session(["url"=>$url]);
        }
        return view("blogadmin.index",["userInfoData"=>$userInfoData,"token"=>$token,"uid"=>$id,"articleData"=>$articleData, "userName"=>$userName, "phpVersion"=>$phpVersion,"system"=>$system, "dbVersion"=>$dataBaseVersion, "upload_max_filesize"=>$upload_max_filesize]);
    }
    
    public function welcome(Request $request, $uid, $token, $v=2){
        $id = intval($uid);
        $userInfoData = $this->model->getUserInfoByUid($id);
        $userName = "";
        if($userInfoData!=null){
            $userName = $userInfoData["name"];
        }
        $phpVersion = PHP_VERSION;
        $system = PHP_OS;
        $dataBaseVersion = DB::select("select version()");
        $dataBaseVersion = (array)($dataBaseVersion[0]);
        $dataBaseVersion = $dataBaseVersion["version()"];
        $upload_max_filesize = ini_get("upload_max_filesize");
        $num = 5;
        $articleData = $this->model->getContents($num);
        return view("blogadmin.welcome",["token"=>$token,"uid"=>$id,"articleData"=>$articleData, "userName"=>$userName, "phpVersion"=>$phpVersion,"system"=>$system, "dbVersion"=>$dataBaseVersion, "upload_max_filesize"=>$upload_max_filesize]);
    }
    
    public function articleList(Request $request, $uid, $token,  $searchVal="null"){
        return view("blogadmin.articleList", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function articleListApi(Request $request, $uid, $token){
        $page  = intval($request->input("page"));
        $limit = intval($request->input("limit"));
        $searchVal = $request->input("searchVal");
        $count = 0;
        $code = 0;
        $data = null;
        if($searchVal==""){
            $data = $this->model->getArticlesDataByNoSearchval($page, $limit);
            $tempData = $this->model->getAllArticleData();
            $count = $tempData==null?0:count($tempData);
        }else{
            $data = $this->model->getArticlesDataBySearchval($searchVal, $page, $limit);
            $tempData = $this->model->getAllArticelDataBySearchval($searchVal);
            $count = $tempData==null?0:count($tempData);
        }
        return $this->apiToJson($data, $code, $count);
    }
    
    public function addNews(Request $request, $uid, $token, $v=3){
        
        return view("blogadmin.addNews", ["uid"=> $uid, "token"=> $token]);
    }
    
    public function getCategoryApi(Request $request){
        $data = $this->model->getCategory();
        return $this->toJson($data, 200);
        
    }
    
    public function editArticle(Request $request, $uid, $token, $id){
        return "<p id='testEditArticle'>测试文章编辑</p>";
    }
    
    public function allCategory(Request $request, $uid, $token, $v=4){
        return view("blogadmin.allCategory", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function subCategory(Request $request, $uid, $token, $v=5){
        return view("blogadmin.subCategory", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function addCategory($uid, $token, $v=6){
        return view("blogadmin.addCategory", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function addSubCategory(Request $request, $uid, $token, $v=7){
        $categoryData = $this->model->getCategory();
        $data = [];
        if($categoryData!=[]){
            $data = $categoryData["category"];
        }
        return view("blogadmin.addSubCategory", ["categoryData"=>$data,"uid"=>$uid, "token"=>$token]);
    }
    
    public function indexImg($uid, $token, $v = 8){
        return view("blogadmin.indexImg", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function addImg($uid, $token, $v = 9){
        return view("blogadmin.addImg", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function about($uid, $token, $v=10){
        $dataAbout = $this->model->getAbout();
        $id = 0;
        $content = "";
        if($dataAbout!=null){
            $id = $dataAbout["id"];
            $content = $dataAbout["content"];
        }
        return view("blogadmin.about", ["uid"=>$uid, "token"=>$token, "id"=>$id, "content"=>$content]);
    }
    
    public function motto($uid, $token, $v=11){
        $dataMotto = $this->model->getMotto();
        $id = 0;
        $content = "";
        if($dataMotto!=null){
            $id = $dataMotto["id"];
            $content = $dataMotto["content"];
        }
        return view("blogadmin.motto", ["uid"=>$uid, "token"=>$token, "id"=>$id, "content"=>$content]);
    }
    
    public function linkList($uid, $token, $v=12){
        return view("blogadmin.linkList", ["uid"=>$uid, "token"=>$token]);
    }
    
    public function addLink($uid, $token, $v=13){
        return view("blogadmin.addLink", ["uid"=>$uid, "token"=>$token]);
    }
}