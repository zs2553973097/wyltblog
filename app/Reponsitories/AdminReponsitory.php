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
use App\Models\Users;
use App\Models\UsersAccess;

class AdminReponsitory {

    protected $mottoModel;
    protected $imgshowModel;
    protected $contentModel;
    protected $aboutModel;
    protected $archiveModel;
    protected $linksModel;
    protected $categoryModel;
    protected $subcategoryModel;
    protected $usersModel;
    protected $usersAccessModel;

    public function __construct() {
        $this->mottoModel = new Motto();
        $this->imgshowModel = new Imgshow();
        $this->contentModel = new Content();
        $this->aboutModel = new About();
        $this->archiveModel = new Archive();
        $this->linksModel = new Links();
        $this->categoryModel = new Category();
        $this->subcategoryModel = new SubCategory();
        $this->usersModel = new Users();
        $this->usersAccessModel = new UsersAccess();
    }
    
    public function doLogin($name, $password){
        $params = [
            "name" => $name,
            "password" =>md5($password),
            "type" => 1
        ];
        $data = $this->usersModel->where($params)->first();
        return $data;
    }
    
    public function getUserInfoByUid($id){
        $where["id"] = $id;
        $data = $this->usersModel->where($where)->first();
        if($data!=null){
            return $data->toArray();
        }
        return null;
    }
    
    public function getContents($num){
        $data = $this->contentModel->orderBy("update_time", "desc")->limit($num)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getAllArticleData(){
        $data = $this->contentModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getAllArticelDataBySearchval($val){
        $data = $this->contentModel->where("title", "like", "%$val%")->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getArticlesDataByNoSearchval($page, $limit){
        $offset = ($page - 1)*$limit;
        $data = $this->contentModel->orderBy("update_time","desc")->offset($offset)->limit($limit)->get(["id", "title", "create_time", "update_time", "origin", "reference" ,"article_verify"]);
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getArticlesDataBySearchval($val, $page, $limit){
        $offset = ($page -1 )*$limit;
        $data = $this->contentModel->where("title", "like", "%$val%")->orderBy("update_time", "desc")->offset($offset)->limit($limit)->get(["id", "title", "create_time", "update_time", "origin", "reference", "article_verify"]);
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getCategory(){
        $dataCategory = $this->categoryModel->get();
        $dataCategory = $dataCategory->toArray();
        $dataSubCategory = $this->subcategoryModel->get();
        $dataSubCategory = $dataSubCategory->toArray();
        $data = [
            "category" => $dataCategory,
            "subcategory" => $dataSubCategory
        ];
        if($dataCategory!=[]){
            /*
            if($dataSubCategory!=[]){
            return $data;
            }
            */
            return $data;
        }
        return [];
    }
    
    public function insertArticle($data){
        $flag = $this->contentModel->insert($data);
        if($flag){
            return true;
        }
        return false;
    }
    
    public function setArticleVerify($id, $article_veriry){
        $data["article_verify"] = $article_veriry;
        $flag = $this->contentModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function getArticleByIdApi($id){
        $data = $this->contentModel->where("id", $id)->first();
        if($data!=null){
            return $data->toArray();
        }
        return null;
    }
    
    public function getsubCategoryById($id){
        $data = $this->subcategoryModel->where("id", $id)->first();
        if($data!=null){
            $name = $data->name;
            return $name;
        }
        return null;
    }
    
    public function updateArticle($id, $data){
        $flag = $this->contentModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function updateUserInfo($id, $data){
        $flag = $this->usersModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function delArticleById($id){
        $data = $this->contentModel->where("id", $id)->first();
        if($data!=null){
            $flag = $this->contentModel->where("id", $id)->delete();
            if($flag){
                return $data;
            }
            return null;
        }
        return null;
    }
    
    public function categoryList($page, $limit){
        $offset = ($page - 1)*$limit;
        $data = $this->categoryModel->offset($offset)->limit($limit)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function subCategoryList($page, $limit){
        $offset = ($page - 1)*$limit;
        $data = $this->subcategoryModel->offset($offset)->limit($limit)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getCategoryById($id){
        $data = $this->categoryModel->where("id", $id)->first();
        return $data;
    }
    
    public function updateCategoryNameById($id, $name){
        $data["name"] = $name;
        $flag = $this->categoryModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function insertCategory($name){
        $data["name"] = $name;
        $flag = $this->categoryModel->insert($data);
        return $flag;
    }
    
    public function addSubCategory($data){
        $flag = $this->subcategoryModel->insert($data);
        return $flag;
    }
    
    public function delCategoryById($id){
        $flag = $this->categoryModel->where("id", $id)->delete();
        $subFlag = $this->subcategoryModel->where("category_id", $id)->delete();
        if($flag&&$subFlag){
            return true;
        }
        return false;
    }
    
    public function updateSubCategoryById($id, $data){
        $flag = $this->subcategoryModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function delSubCategoryById($id){
        $flag = $this->subcategoryModel->where("id", $id)->delete();
        return $flag;
    }
    
    public function getImglinkFromImgshow($page, $limit){
        $offset = ($page-1)*$limit;
        $data = $this->imgshowModel->offset($offset)->limit($limit)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function getAllImgshowData(){
        $data = $this->imgshowModel->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function addIndexImg($imglink){
        $data["imglink"] = $imglink;
        $time = time();
        $data["create_time"] = $time;
        $data["update_time"] = $time;
        $flag = $this->imgshowModel->insert($data);
        return $flag;
    }
    
    public function updateImg($id, $imglink){
        $data["imglink"] = $imglink;
        $data["update_time"] = time();
        $flag = $this->imgshowModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function deleteImglinkById($id){
        $flag = $this->imgshowModel->where("id", $id)->delete();
        return $flag;
    }
    
    public function updateUserPassword($id, $password){
        $data["password"] = md5($password);
        $flag = $this->usersModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function doAbout($id, $content){
        $data["content"] = $content;
        $time = time();
        $flag = false;
        if($id == 0){
            $data["create_time"] = $time;
            $data["update_time"] = $time;
            $flag = $this->aboutModel->insert($data);
        }else{
            $data["update_time"] = $time;
            $flag = $this->aboutModel->where("id", $id)->update($data);
        }
        return $flag;
    }
    
    public function getAbout(){
        $data = $this->aboutModel->first();
        if($data!=null){
            return $data->toArray();
        }
        return null;
    }
    
    public function doMotto($id, $content){
        $data["content"] = $content;
        $flag = false;
        if($id == 0){
            $flag = $this->mottoModel->insert($data);
        }else{
            $flag = $this->mottoModel->where("id", $id)->update($data);
        }
        return $flag;
    }
    
    public function getMotto(){
        $data = $this->mottoModel->first();
        if($data!=null){
            return $data->toArray();
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
    
    public function linkList($page, $limit){
        $offset = ($page-1)*$limit;
        $data = $this->linksModel->offset($offset)->limit($limit)->get();
        $data = $data->toArray();
        if($data!=[]){
            return $data;
        }
        return null;
    }
    
    public function insertLink($data){
        $flag = $this->linksModel->insert($data);
        return $flag;
    }
    
    public function updateLink($id, $data){
        $flag = $this->linksModel->where("id", $id)->update($data);
        return $flag;
    }
    
    public function delLink($id){
        $flag = $this->linksModel->where("id", $id)->delete();
        return $flag;
    }
}