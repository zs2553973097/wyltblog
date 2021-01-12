<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\FrontService;
use Illuminate\Http\Request;
//date_default_timezone_set('Etc/GMT-8');
class BlogController extends Controller{
    protected $model;
    
    public function __construct() {
        //parent::__construct();
        $this->model = new FrontService();
    }

    public function phpInfo(){
        //return phpinfo();
        
    }

        public function index(){
        //$model = new FrontService();
        //$Motto = $model->getMotto();
        
        $link = $this->model->getLinkExt();
        if($link==null){
            $link = "images/timg.jpg";
        }
        $contentNum = 5;
        $contents = $this->model->getContents($contentNum);
        $className = "home";
        $title = "首页";
        return view("blog.index",["title"=>$title,"className"=>$className,"link"=>$link,"contents"=>$contents]);
    }
    public function category(){
        //$model = new FrontService();
        //$motto = $model->getMotto();
        /*
        $about = $model->getAbout();
        $archive = $model->getArchive();
        $links = $model->getLinks();
        */
        $categories = $this->model->getCategories();
        $className = "archive";
        $title = "分类";
        return view("blog.category",["title"=>$title,"className"=>$className, "categories"=>$categories]);
    }
    
    public function articles( $id, $subid=null, $name = "全部"){
        
        $categoryData = $this->model->getCategoryById($id);
        $title = $categoryData["name"];
        $categories = $this->model->getSubCategoriesById($id);
        $contentData = $this->model->getContentsBySubId($id,$subid);
        if($contentData!=null){
            $format = "Y-m-d H:i:s";
            foreach($contentData as &$val){
                $timestamp = $val["update_time"];
                $val["update_time"] = date($format, $timestamp);
            }
        }
        $className = "archive";
        return view("blog.articles", ["name"=>$name,"id"=>$id,"title"=>$title,"className"=>$className, "categories"=>$categories, "contentData"=>$contentData]);
    }
    
    public function about(){
        /*
        $model = new FrontService();
        $about = $model->getAbout();
        */
        $title = "关于";
        $className = "archive";
        
        return view("blog.about", ["title"=>$title, "className"=>$className]);
    }
    
    public function getAboutContent(Request $request){
        //$model = new FrontService();
        if($request->isMethod('post')){
            $about = $this->model->getAbout();
            if($about!=null){
                return $this->toJson($about, 200);
            }
            return $this->toJson(null, 1);
        }
        return $this->toJson(null, 2);
    }
    
    public function article($id, $secret = 0){
        $id = intval($id);
        $className = "archive";
        $title = "测试题头";
        $reference = url()->current();
        $addFlag = $this->model->addBrowserNum($id);
        return view("blog.article", ["secret"=>$secret,"reference"=>$reference,"title"=>$title,"id"=>$id,"className"=>$className]);
    }
    
    public function getArticleContent(Request $request){
        if(isset($request->id)&&$request->isMethod('post')){
            $id = $request->id;
            $secret = $request->secret;
            $articleData = $this->model->getContentById($id, $secret);
            if($articleData!=null){
                return $this->toJson($articleData, 200);
            }
            return $this->toJson(null, 1);
        }
        return $this->toJson(null, 2);
    }
    
    public function getSecretContent(Request $request){
        if($request->isMethod("post")){
            $id = $request->id;
            $secret = $request->secret;
            $password = $request->password;
            $passwordArr = ["ilovelt","lt2020","hellofriend"];
            //测试输入口令
            if(in_array($password, $passwordArr)){
                $data = $this->model->getSecretContentById($id);
                if($data!=null){
                    return $this->toJson($data, 51);
                }
                return $this->toJson(null, 52);
            }
        }
    }

        public function links(){
        $linksData = $this->model->getLinks();
        $title = "友情链接";
        $className = "archive";
        return view("blog.links",["title"=>$title, "className"=>$className, "links"=>$linksData]);
    }
    
    public function archive(){
        $title = "归档";
        $className = "archive";
        $archiveData = $this->model->getArchive();
        return view("blog.archive", ["title"=>$title, "className"=>$className, "archive"=>$archiveData]);
    }
    
    public function searchList($searchVal=""){
        $title = $searchVal."的搜索结果";
        $contentData = $this->model->getContentsBySearch($searchVal);
        if($contentData!=null){
            $format = "Y-m-d H:i:s";
            foreach($contentData as &$val){
                $timestamp = $val["update_time"];
                $val["update_time"] = date($format, $timestamp);
                /*
                $replace = "<span style='color:red;'>".$searchVal."</span>";
                $val["title"] = str_replace($searchVal, $replace, $val["title"]);
                $val["description"] = str_replace($searchVal, $replace, $val["description"]);
                */
            }
        }
        $className = "archive";
        return view("blog.searchList", ["searchVal"=>$searchVal,"title"=>$title,"className"=>$className,  "contentData"=>$contentData]);
    }
}
