<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get("phpinfo","Home\BlogController@phpInfo");
Route::get("/","Home\BlogController@index");
Route::get("category", "Home\BlogController@category");
Route::get("articles/{id}/{subid?}/{name?}", "Home\BlogController@articles");
Route::get("about","Home\BlogController@about");
Route::post("getAboutContent","Home\BlogController@getAboutContent");
Route::get("article/{id}/{secret?}","Home\BlogController@article");
Route::post("getArticleContent","Home\BlogController@getArticleContent");
Route::get("links","Home\BlogController@links");
Route::get("archive","Home\BlogController@archive");
Route::get("searchList/{searchVal?}", "Home\BlogController@searchList");
Route::post("getSecretContent", "Home\BlogController@getSecretContent");
/*
Route::get("errorPage",function(){
    return view("errorPage");
});
*/

Route::get("login","Admin\AdminController@login");
Route::get("getYzm/{random?}","Admin\AdminController@getYzm");
Route::post("doLogin", "Admin\AdminController@doLogin");

/*
Route::group(["prefix"=>"Admin","namespace"=>"Admin","middleware"=>["web.admin"]],function(){
    Route::get("index/{uid}/{token}", "AdminController@index");
    
});
*/
Route::middleware(['web.admin'])->group(function () {
    Route::get("index/{uid}/{token}/{v?}", "Admin\AdminController@index");
    Route::get("welcome/{uid}/{token}/{v?}", "Admin\AdminController@welcome");
    Route::get("articleList/{uid}/{token}/{searchVal?}", "Admin\AdminController@articleList");
    Route::get("articleListApi/{uid}/{token}", "Admin\AdminController@articleListApi");
    Route::get("addNews/{uid}/{token}/{v?}", "Admin\AdminController@addNews");
    Route::post("addArticleApi","Api\ApiController@addArticleApi");
    Route::post("upLoadImgApi","Api\ApiController@upLoadImgApi");
    Route::post("articleVerifyApi", "Api\ApiController@articleVerifyApi");
    Route::get("editArticle/{uid}/{token}/{id}", "Admin\AdminController@editArticle");
    Route::post("getArticleByIdApi", "Api\ApiController@getArticleByIdApi");
    Route::post("deleteImage","Api\ApiController@deleteImage");
    Route::post("editArticleApi","Api\ApiController@editArticleApi");
    Route::post("logout","Admin\AdminController@logout");
    Route::post("editUser","Api\ApiController@editUser");
    Route::post("delArticleByIdApi","Api\ApiController@delArticleByIdApi");
    Route::get("allCategory/{uid}/{token}/{v?}","Admin\AdminController@allCategory");
    Route::get("categoryListApi/{uid}/{token}","Api\ApiController@categoryListApi");
    Route::get("subCategory/{uid}/{token}/{v?}","Admin\AdminController@subCategory");
    Route::get("subCategoryListApi/{uid}/{token}","Api\ApiController@subCategoryListApi");
    Route::post("editCategoryApi", "Api\ApiController@editCategoryApi");
    Route::get("addCategory/{uid}/{token}/{v?}", "Admin\AdminController@addCategory");
    Route::post("addCategoryApi","Api\ApiController@addCategoryApi");
    Route::get("addSubCategory/{uid}/{token}/{v?}", "Admin\AdminController@addSubCategory");
    Route::post("addSubCategoryApi","Api\ApiController@addSubCategoryApi");
    Route::post("delCategoryApi","Api\ApiController@delCategoryApi");
    Route::post("getDefaultCategoryApi", "Api\ApiController@getDefaultCategoryApi");
    Route::post("editSubCategoryApi","Api\ApiController@editSubCategoryApi");
    Route::post("delSubCategoryApi", "Api\ApiController@delSubCategoryApi");
    Route::get("indexImg/{uid}/{token}/{v?}", "Admin\AdminController@indexImg");
    Route::get("imageListApi/{uid}/{token}", "Api\ApiController@imageListApi");
    Route::post("addIndexImgApi", "Api\ApiController@addIndexImgApi");
    Route::get("addImg/{uid}/{token}/{v?}", "Admin\AdminController@addImg");
    Route::post("editImgApi", "Api\ApiController@editImgApi");
    Route::post("delImageApi", "Api\ApiController@delImageApi");
    Route::post("editUserPass", "Api\ApiController@editUserPass");
    Route::get("about/{uid}/{token}/{v?}", "Admin\AdminController@about");
    Route::post("addOrEditAboutApi", "Api\ApiController@addOrEditAboutApi");
    Route::get("motto/{uid}/{token}/{v?}", "Admin\AdminController@motto");
    Route::post("mottoApi", "Api\ApiController@mottoApi");
    Route::get("linkList/{uid}/{token}/{v?}", "Admin\AdminController@linkList");
    Route::get("linkListApi/{uid}/{token}", "Api\ApiController@linkListApi");
    Route::get("addLink/{uid}/{token}/{v?}", "Admin\AdminController@addLink");
    Route::post("addLinkApi", "Api\ApiController@addLinkApi");
    Route::post("editLinkApi", "Api\ApiController@editLinkApi");
    Route::post("delLinkApi", "Api\ApiController@delLinkApi");
});
Route::post("getCategoryApi", "Admin\AdminController@getCategoryApi");

