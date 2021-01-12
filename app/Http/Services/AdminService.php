<?php

namespace App\Http\Services;

use App\Reponsitories\AdminReponsitory;

class AdminService {

    protected $reponsitory;
    protected $format = "Y-m-d";
    protected $formatExact = "Y-m-d H:i:s";
    public function __construct() {
        $this->reponsitory = new AdminReponsitory();
    }
    
    public function doLogin($name, $passwrod){
        $data= $this->reponsitory->doLogin($name, $passwrod);
        return $data;
    }
    
    public function getUserInfoByUid($id){
        $data = $this->reponsitory->getUserInfoByUid($id);
        return $data;
    }
    
    public function getContents($num){
        $data =  $this->reponsitory->getContents($num);
        if($data!=null){
            foreach ($data as &$val){
                $timestamp = $val["update_time"];
                $val["update_time"] = date($this->format, $timestamp);
            }
            return $data;
        }
        return null;
    }
    
    public function getAllArticleData(){
        return $this->reponsitory->getAllArticleData();
    }
    
    public function getAllArticelDataBySearchval($val){
        return $this->reponsitory->getAllArticelDataBySearchval($val);
    }
    
    public function getArticlesDataByNoSearchval($page, $limit){
        $data =  $this->reponsitory->getArticlesDataByNoSearchval($page, $limit);
        if($data!=null){
            foreach($data as &$v){
                $timestampCreate = $v["create_time"];
                $timestampUpdate = $v["update_time"];
                $v["create_time"] = date($this->formatExact, $timestampCreate);
                $v["update_time"] = date($this->formatExact, $timestampUpdate);
            }
            return $data;
        }
        return null;
    }
    
    public function getArticlesDataBySearchval($val, $page, $limit){
        $data =  $this->reponsitory->getArticlesDataBySearchval($val, $page, $limit);
        if($data!=null){
            foreach($data as &$v){
                $timestampCreate = $v["create_time"];
                $timestampUpdate = $v["update_time"];
                $v["create_time"] = date($this->formatExact, $timestampCreate);
                $v["update_time"] = date($this->formatExact, $timestampUpdate);
            }
            return $data;
        }
        return null;
    }
    
    public function getCategory(){
        $data = $this->reponsitory->getCategory();
        return $data;
    }
    
    public function insertArticle($data){
        $flag = $this->reponsitory->insertArticle($data);
        return $flag;
    }
    
    public function setArticleVerify($id, $article_verify){
        $flag = $this->reponsitory->setArticleVerify($id, $article_verify);
        return $flag;
    }
    
    public function getArticleByIdApi($id){
        $data = $this->reponsitory->getArticleByIdApi($id);
        $data["category"] = null;
        if($data!=null){
            $subCategoryName = $this->reponsitory->getsubCategoryById($data["sub_category_id"]);
            $data["category"] = $subCategoryName;
        }
        
        return $data;
    }
    
    public function updateArticle($id, $data){
        $flag = $this->reponsitory->updateArticle($id, $data);
        return $flag;
    }
    
    public function updateUserInfo($id, $data){
        $flag = $this->reponsitory->updateUserInfo($id, $data);
        return $flag;
    }
    
    public function delArticleById($id){
        $data = $this->reponsitory->delArticleById($id);
        return $data;
    }
    
    public function categoryList($page, $limit){
        $data = $this->reponsitory->categoryList($page, $limit);
        return $data;
    }
    
    public function subCategoryList($page, $limit){
        $data = $this->reponsitory->subCategoryList($page, $limit);
        if($data!=null){
            foreach ($data as &$v){
                $category_id = $v["category_id"];
                $categoryData = $this->reponsitory->getCategoryById($category_id);
                $v["category"] = "";
                if($categoryData!=null){
                    $v["category"] = $categoryData["name"];
                }
            }
        }
        return $data;
    }
    
    public function updateCategoryNameById($id, $name){
        $flag = $this->reponsitory->updateCategoryNameById($id, $name);
        return $flag;
    }
    
    public function insertCategory($name){
        $flag = $this->reponsitory->insertCategory($name);
        return $flag;
    }
    
    public function addSubCategory($data){
        $flag = $this->reponsitory->addSubCategory($data);
        return $flag;
    }
    
    public function delCategoryById($id){
        $flag = $this->reponsitory->delCategoryById($id);
        return $flag;
    }
    
    public function updateSubCategoryById($id, $data){
        $flag = $this->reponsitory->updateSubCategoryById($id, $data);
        return $flag;
    }
    
    public function delSubCategoryById($id){
        $flag = $this->reponsitory->delSubCategoryById($id);
        return $flag;
    }
    
    public function getImglinkFromImgshow($page, $limit){
        $data = $this->reponsitory->getImglinkFromImgshow($page, $limit);
        if($data!=null){
            return $data;
        }
        return null;
    }
    
    public function getAllImgshowData(){
        $data = $this->reponsitory->getAllImgshowData();
        return $data;
    }
    
    public function addIndexImg($imglink){
        $flag = $this->reponsitory->addIndexImg($imglink);
        return $flag;
    }
    
    public function updateImg($id, $imglink){
        $flag = $this->reponsitory->updateImg($id, $imglink);
        return $flag;
    }
    
    public function deleteImglinkById($id){
        $flag = $this->reponsitory->deleteImglinkById($id);
        return $flag;
    }
    
    public function updateUserPassword($id, $password){
        $flag = $this->reponsitory->updateUserPassword($id, $password);
        return $flag;
    }
    
    public function doAbout($id, $content){
        $flag = $this->reponsitory->doAbout($id, $content);
        return $flag;
    }
    
    public function getAbout(){
        $data = $this->reponsitory->getAbout();
        return $data;
    }
    
    public function doMotto($id, $content){
        $flag = $this->reponsitory->doMotto($id, $content);
        return $flag;
    }
    
    public function getMotto(){
        $data = $this->reponsitory->getMotto();
        return $data;
    }
    
    public function getLinks(){
        $data = $this->reponsitory->getLinks();
        return $data;
    }
    
    public function linkList($page, $limit){
        $data = $this->reponsitory->linkList($page, $limit);
        return $data;
    }
    
    public function insertLink($data){
        $flag = $this->reponsitory->insertLink($data);
        return $flag;
    }
    
    public function updateLink($id, $data){
        $flag = $this->reponsitory->updateLink($id, $data);
        return $flag;
    }
    
    public function delLink($id){
        $flag = $this->reponsitory->delLink($id);
        return $flag;
    }
}