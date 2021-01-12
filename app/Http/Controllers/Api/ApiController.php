<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\AdminService;
use Illuminate\Http\Request;
use App\Utilities\Utility;
use App\Utilities\ValidData;

class ApiController extends Controller{
    protected $model;
    public function __construct(){
        $this->model = new AdminService();
    }
    
    public function addArticleApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $input = array_diff_key($input, ["file"=>"","uid"=>"","token"=>""]);
            $input["sub_category_id"] = intval($input["sub_category_id"]);
            $input["category_id"] = intval($input["category_id"]);
            $input["article_verify"] = intval($input["article_verify"]);
            $time = time();
            $input["create_time"] = $time;
            $input["update_time"] = $time;
            $flag = $this->model->insertArticle($input);
            if($flag){
                return $this->toJson(null, 8);
            }
        }
        return $this->toJson(null, 9);
    }
    
    public function upLoadImgApi(Request $request){
        if($request->isMethod("post")){
            $billFlag = $request->billFlag;
            if(isset($_FILES)){
                $file = $billFlag=="true"?$_FILES["file"]:$_FILES["image"];
                $types = ["image/bmp","image/png","image/jpeg","image/gif"];
                $type = "";
                $maxsize = 4*1024*1024;//4M大小
                if($file["error"]==0){
                    $type = $file["type"];
                }
                $filesize = 0;
                $fileExt = "";
                if(in_array($type, $types)){
                    $filesize = $file["size"];
                    $fileExt = substr($file["name"], -4);
                }
                if($filesize>$maxsize){
                    return $this->toJson(null, 10);
                }
                $dir = "images";
                if(!file_exists($dir)){
                    mkdir($dir, 0777);
                }
                chdir($dir);
                $time = time();
                $format = "Y-m-d";
                $path = date($format,$time);
                if(!file_exists($path)){
                    mkdir($path,0777);
                }
                chdir($path);
                $filename = $time.$fileExt;
                $filePath = $dir."/".$path."/".$filename;
                //var_dump($file);
                $moveFileFlag = move_uploaded_file($file["tmp_name"],$filename);
                if($moveFileFlag){
                    
                    return $this->toJsonPic($filePath, 0);
                }
                return $this->toJsonPic($filePath, 1);
            }
        }
    }
    
    public function articleVerifyApi(Request $request){
        if($request->isMethod("post")){
            $id = $request->id;
            $article_verify = $request->article_verify;
            $flag = $this->model->setArticleVerify($id, $article_verify);
            if($flag){
                return $this->toJson(null, 200);
            }
            return $this->toJson(null, 11);
        }
    }
    
    public function getArticleByIdApi(Request $request){
        if($request->isMethod("post")){
            $id = $request->id;
            $data = $this->model->getArticleByIdApi($id);
            if($data){
                return $this->toJson($data, 200);
            }
        }
        return $this->toJson(null, 1);
    }
    
    public function editArticleApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $input = array_diff_key($input, ["file"=>"","id"=>"","uid"=>"","token"=>""]);
            $input["sub_category_id"] = intval($input["sub_category_id"]);
            $input["category_id"] = intval($input["category_id"]);
            $input["article_verify"] = intval($input["article_verify"]);
            $time = time();
            $input["update_time"] = $time;
            $flag = $this->model->updateArticle($id, $input);
            if($flag){
                return $this->toJson(null, 12);
            }
        }
        return $this->toJson(null, 13);
    }
    
    public function deleteImage(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $picPath = $input["picPath"];
            $host = $_SERVER["HTTP_HOST"];
            
            if(strripos($picPath, $host)!=false){
                //开始删除图片文件
                $dir = base_path();
                $dir = str_replace("\\", "/", $dir);
                $dir = $dir."/public";
                $offset = strlen($host);
                $start = stripos($picPath, $host);
                $start = $start+$offset;
                $path = substr($picPath, $start);
                $filename = $dir.$path;
                try{
                    if(file_exists($filename)&&unlink($filename)){
                        return $this->toJson(null, 14);
                    }
                }
                catch(Exception $e){
                    //print $e->getMessage();
                }
                return $this->toJson(null, 15);
            }
        }
    }
    
    public function editUser(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["uid"];
            $input = array_diff_key($input, ["id"=>"", "uid"=>"", "token"=>""]);
            $input["update_time"] = time();
            $input["sex"] = intval($input["sex"]);
            $input["type"] = intval($input["type"]);
            $flag = $this->model->updateUserInfo($id, $input);
            if($flag){
                return $this->toJson(null, 18);
            }
        }
        return $this->toJson(null, 19);
    }
    
    public function delArticleByIdApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            
            $articleContentData = $this->model->delArticleById($id);
            $delImgArr = [];
            if($articleContentData!=null){
                $delImgArr = Utility::delImage($articleContentData->content,$articleContentData->bill);
            }else{
                return $this->toJson(null, 21);
            }
            
            if($delImgArr!=[]){
                return $this->toJson($delImgArr, 20);
            }
        }
        return $this->toJson(null, 21);
    }
    
    public function categoryListApi(Request $request, $uid, $token){
        $page = intval($request->input("page"));
        $limit = intval($request->input("limit"));
        $code = 0;
        $count = 0;
        $categoryData = $this->model->getCategory();
        if($categoryData!=[]){
            $count = count($categoryData["category"]);
        }
        $data = $this->model->categoryList($page, $limit);
        return $this->apiToJson($data, $code, $count);
    }
    
    public function subCategoryListApi(Request $request, $uid, $token){
        $page = intval($request->input("page"));
        $limit = intval($request->input("limit"));
        $code = 0;
        $count = 0;
        $categoryData = $this->model->getCategory();
        if($categoryData!=[]){
            $count = count($categoryData["subcategory"]);
        }
        $data = $this->model->subCategoryList($page, $limit);
        return $this->apiToJson($data, $code, $count);
    }
    
    public function editCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $name = $input["name"];
            $flag = $this->model->updateCategoryNameById($id, $name);
            if($flag){
                return $this->toJson(null, 22);
            }
            return $this->toJson(null, 23);
        }
    }
    
    public function addCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $name = $input["name"];
            $flag = $this->model->insertCategory($name);
            if($flag){
                return $this->toJson(null, 24);
            }
            return $this->toJson(null, 25);
        }
    }
    
    public function addSubCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $name = $input["name"];
            $category_id = $input["category_id"];
            $data = ["name"=>$name, "category_id"=>$category_id];
            $flag = $this->model->addSubCategory($data);
            if($flag){
                return $this->toJson($data, 26);
            }
            return $this->toJson(null, 27);
        }
    }
    
    public function delCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $flag = $this->model->delCategoryById($id);
            if($flag){
                return $this->toJson(null, 28);
            }
            return $this->toJson(null, 29);
        }
    }
    
    public function getDefaultCategoryApi(Request $request){
        if($request->isMethod("post")){
            $data = $this->model->getCategory();
            $categoryData = null;
            if($data!=[]){
                $categoryData = $data["category"];
            }
            return $this->toJson($categoryData, 200);
        }
    }
    
    public function editSubCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $category_id = $input["category_id"];
            $name = $input["name"];
            $data = ["name"=> $name, "category_id" => $category_id];
            $flag = $this->model->updateSubCategoryById($id, $data);
            if($flag){
                return $this->toJson(null, 30);
            }
            return $this->toJson(null, 31);
        }
    }
    
    public function delSubCategoryApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $flag = $this->model->delSubCategoryById($id);
            if($flag){
                return $this->toJson(null, 32);
            }
            return $this->toJson(null, 33);
        }
    }
    
    /*
     * 获取首页图片
     */
    public function imageListApi(Request $request, $uid, $token){
        $page  = intval($request->input("page"));
        $limit = intval($request->input("limit"));
        $code = 0;
        $data = $this->model->getImglinkFromImgshow($page, $limit);
        $tempdata = $this->model->getAllImgshowData();
        $count = $tempdata==null?0:count($this->model->getAllImgshowData());
        return $this->apiToJson($data, $code, $count);
    }
    
    public function addIndexImgApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $imglink = $input["imglink"];
            $flag = $this->model->addIndexImg($imglink);
            if($flag){
                return $this->toJson($imglink, 34);
            }
            return $this->toJson(null, 35);
        }
    }
    
    public function editImgApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $imglink = $input["imglink"];
            $flag = $this->model->updateImg($id, $imglink);
            if($flag){
                return $this->toJson(null, 36);
            }
            return $this->toJson(null, 37);
        }
    }
    
    public function delImageApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $imglink = $input["imglink"];
            $flag = $this->model->deleteImglinkById($id);
            if((substr_count($imglink, "http://")>0|| substr_count($imglink, "https://")>0)&&$flag){
                return $this->toJson(null, 14);
            }else{
                $dir = base_path();
                $dir = str_replace("\\", "/", $dir);
                $dir = $dir."/public/";
                $filename = $dir.$imglink;
                try{
                    if(file_exists($filename)&&unlink($filename)&&$flag){
                        return $this->toJson(null, 14);
                    }
                }
                catch(Exception $e){
                    
                }
                return $this->toJson(null, 15);
            }
        }
    }
    
    public function editUserPass(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $password = $input["password"];
            $valid = new ValidData();
            $validataFlag = $valid->validPassword($password);
            if(!$validataFlag){
                return $this->toJson(null, 40);
            }
            $flag = $this->model->updateUserPassword($id, $password);
            if($flag){
                return $this->toJson(null, 38);
            }
            return $this->toJson(null, 39);
        }
    }
    
    public function addOrEditAboutApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = intval($input["id"]);
            $content = $input["content"];
            $flag = $this->model->doAbout($id, $content);
            if($flag){
                return $this->toJson(null, 41);
            }
            return $this->toJson(null, 42);
        }
    }
    
    public function mottoApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = intval($input["id"]);
            $content = $input["content"];
            $flag = $this->model->doMotto($id, $content);
            if($flag){
                return $this->toJson(null, 43);
            }
            return $this->toJson(null, 44);
        }
    }
    
    public function linkListApi(Request $request){
        $page = intval($request->input("page"));
        $limit = intval($request->input("limit"));
        $code = 0;
        $count = 0;
        $linksData = $this->model->getLinks();
        if($linksData!=null){
            $count = count($linksData);
        }
        $data = $this->model->linkList($page, $limit);
        return $this->apiToJson($data, $code, $count);
    }
    
    public function addLinkApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $name = $input["name"];
            $link = $input["link"];
            $data["name"] = $name;
            $data["link"] = $link;
            $flag = $this->model->insertLink($data);
            if($flag){
                return $this->toJson(null, 45);
            }
            return $this->toJson(null, 46);
        }
    }
    
    public function editLinkApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $name = $input["name"];
            $link = $input["link"];
            $data["name"] = $name;
            $data["link"] = $link;
            $flag = $this->model->updateLink($id,$data);
            if($flag){
                return $this->toJson(null, 47);
            }
            return $this->toJson(null, 48);
        }
    }
    
    public function delLinkApi(Request $request){
        if($request->isMethod("post")){
            $input = $request->input();
            $id = $input["id"];
            $flag = $this->model->delLink($id);
            if($flag){
                return $this->toJson(null, 49);
            }
            return $this->toJson(null, 50);
        }
    }
}
