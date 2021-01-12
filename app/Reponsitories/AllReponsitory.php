<?php

namespace App\Reponsitories;

use App\Models\Motto;
use App\Models\Imgshow;
use App\Models\Content;
use App\Models\About;
use App\Models\Archive;
use App\Models\Links;
use App\Models\Category;
use App\Models\SubCategory;

class AllReponsitory {

    protected $mottoModel;
    protected $imgshowModel;
    protected $contentModel;
    protected $aboutModel;
    protected $archiveModel;
    protected $linksModel;
    protected $categoryModel;
    protected $subcategoryModel;

    public function __construct() {
        $this->mottoModel = new Motto();
        $this->imgshowModel = new Imgshow();
        $this->contentModel = new Content();
        $this->aboutModel = new About();
        $this->archiveModel = new Archive();
        $this->linksModel = new Links();
        $this->categoryModel = new Category();
        $this->subcategoryModel = new SubCategory();
    }
    

    public function getMotto($id) {
        $data = $this->mottoModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getLinkExt() {
        $data = $this->imgshowModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }

    public function getLink($id) {
        $data = $this->imgshowModel->where("id", $id)->first();
        if($data!=null){
            $data = $data->toArray();
            return $data["imglink"];
        }
        return null;
    }
    
    public function getContents($num){
        $data = $this->contentModel->where("article_verify",1)->orderBy("update_time", "desc")->limit($num)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getAbout(){
        $data = $this->aboutModel->first();
        if($data != null){
            $data = $data->toArray();
            return $data;
        }
        return null;
    }
    
    public function getArchive(){
        $data = $this->archiveModel->first();
        if($data!=null){
            $data = $data->toArray();
            return $data;
        }
        return null;
    }
    
    public function getLinks(){
        $data = $this->linksModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getCategories(){
        $data = $this->categoryModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }

    public function getCategoryById($id){
        $data = $this->categoryModel->where("id", $id)->first();
        if($data!=null){
            $data = $data->toArray();
            return $data;
        }
        return null;
    }
    
    public function getSubCategoriesById($id){
        $data = $this->subcategoryModel->where("category_id", $id)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getContentsBySubId($id,$subid){
        $pageNum = 5;
        if($subid==null){
            $data = $this->contentModel->where("category_id", $id)->where("article_verify",1)->orderBy("update_time", "desc")->paginate($pageNum);
            if($data!=null){
                return $data;
            }
        }else{
            $subid = intval($subid);
            $data = $this->contentModel->where("sub_category_id",$subid)->where("article_verify",1)->orderBy("update_time", "desc")->paginate($pageNum);
            if($data!=null){
                return $data;
            }
        }
        return null;
    }
    
    public function getContentsBySearch($searchVal){
        $pageNum = 5;
        //$data = $this->contentModel->where("article_verify",1)->where("title", "like", "%$searchVal%")->orWhere("description", "like", "%$searchVal%")->orderBy("update_time", "desc")->paginate($pageNum);
        $data = $this->contentModel->where("title", "like", "%$searchVal%")->orWhere("description", "like", "%$searchVal%")->orderBy("update_time", "desc")->paginate($pageNum);
        if($data!=null){
            return $data;
        }
        return null;
    }

    public function getContentById($id, $secret){
        /*
        if($secret==0){
            $data = $this->contentModel->where("id",$id)->where("article_verify", 0)->first();
        }else{
            $data = $this->contentModel->where("id",$id)->first();
        }
        */
        $data = $this->contentModel->where("id",$id)->first();
        if($data!=null){
            $data = $data->toArray();
            $sub_category_id = $data["sub_category_id"];
            $subCategoryData = $this->subcategoryModel->where("id",$sub_category_id)->first();
            $subCategoryName = $subCategoryData->name;
            $data["subCategoryName"] = $subCategoryName;
            return $data;
        }
        return null;
    }
    
    public function getSubCategorieById($id){
        $data = $this->subcategoryModel->where("id", $id)->first();
        if($data!=null){
            return $data->name;
        }
        return null;
    }
    
    public function addBrowserNum($id){
        $addFlag = $this->contentModel->where("id", $id)->increment('browser_num');
        return $addFlag;
    }
    
    public function getNameBySubCategoryId($id){
        $data = $this->subcategoryModel->where("id", $id)->first();
        if($data!=null){
            return $data->name;
        }
        return null;
    }
    
    public function getCategoryByName($name){
        $data = $this->categoryModel->where("name", $name)->first();
        return $data;
    }
    
    public function getSecretContentById($id){
        $data = $this->contentModel->where("id", $id)->first();
        if($data!=null){
            return $data->content;
        }
        return null;
    }
}
