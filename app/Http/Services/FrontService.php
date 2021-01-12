<?php

namespace App\Http\Services;

use App\Reponsitories\AllReponsitory;

class FrontService {

    protected $reponsitory;
    protected $format = "Y-m-d H:i:s";
    
    public function __construct() {
        $this->reponsitory = new AllReponsitory();
    }

    public function getMotto($id = null) {
        $data = $this->reponsitory->getMotto($id);
        if($data!=null){
            $max = count($data)-1;
            $rand = random_int(0, $max);
            return $data[$rand]["content"];
        }
        return null;
    }
    
    public function getLinkExt() {
        $data = $this->reponsitory->getLinkExt();
        if($data!=null){
            $max = count($data)-1;
            $rand = random_int(0, $max);
            return $data[$rand]["imglink"];
        }
        return null;
    }

    public function getLink($id) {
        return $this->reponsitory->getLink($id);
    }
    
    public function getContents($num){
        $data =  $this->reponsitory->getContents($num);
        if($data!=null){
            foreach ($data as &$val){
                $timestamp = $val["update_time"];
                $val["update_time"] = date($this->format, $timestamp);
                $subCategoryId = $val["sub_category_id"];
                $subCategoryName = $this->reponsitory->getSubCategorieById($subCategoryId);
                $val["subcategoryName"] = $subCategoryName;
            }
            return $data;
        }
        return null;
    }

    public function getAbout(){
        $data = $this->reponsitory->getAbout();
        if($data!=null){
            $timestamp = $data["update_time"];
            $data["update_time"] = date($this->format, $timestamp);
            return $data;
        }
        return null;
    }
    
    public function getArchive(){
        $data = $this->reponsitory->getArchive();
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getLinks(){
        $data = $this->reponsitory->getLinks();
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getCategories(){
        $data = $this->reponsitory->getCategories();
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getCategoryById($id){
        $data = $this->reponsitory->getCategoryById($id);
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getSubCategoriesById($id){
        $data = $this->reponsitory->getSubCategoriesById($id);
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getContentsBySubId($id,$subid){
        $data = $this->reponsitory->getContentsBySubId($id,$subid);
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getContentsBySearch($searchVal){
        $data = $this->reponsitory->getContentsBySearch($searchVal);
        if($data!=null){
            foreach ($data as &$v){
                $sub_category = $v["sub_category_id"];
                $name = $this->reponsitory->getNameBySubCategoryId($sub_category);
                $v["name"] = $name;
            }
            return $data;
        }
        return null;
    }

        public function getContentById($id, $secret){
        $data = $this->reponsitory->getContentById($id, $secret);
        //$categoryData = $this->reponsitory->getCategoryByName("影视");
        //$category_id = $categoryData["id"];
        if($data!=null){
            //影视私密浏览
            
            if($data["article_verify"]==0){
                $data["content"] = '<style type="text/css"> div.c1 {margin: 10px;}</style><p>本文章为私密浏览，索取密码QQ：2553973097，资料来自互联网，仅供学习，绝不收费。</p><div class="layui-inline c1"><div class="layui-input-inline"><input type="text" class="layui-input searchVal" id="secretPassword" value=""></div><a class="testtest layui-btn search_btn"  id="subPassword" name="subPassword">提交</a></div>';
            }
            
            $timestamp = $data["update_time"];
            $data["update_time"] = date($this->format, $timestamp);
            return $data;
        }
        return null;
    }
    
    public function doLogin($name, $password){
        
    }
    
    public function addBrowserNum($id){
        $addFlag = $this->reponsitory->addBrowserNum($id);
        return $addFlag;
    }
    
    public function getSecretContentById($id){
        $data = $this->reponsitory->getSecretContentById($id);
        return $data;
    }
}
