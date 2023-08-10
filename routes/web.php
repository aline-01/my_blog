<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_auth;
use App\Http\Controllers\admins;
use App\Http\Controllers\blogs;
use App\Models\blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $all_blogs = blog::all();
    return view('index',["all_blogs"=>$all_blogs]);
});

Route::prefix("/blogs")->group(function() {
    $blog_controller = "App\Http\Controllers\blogs";
    Route::get("/blog/{blog_title}",$blog_controller."@single_page");
});

Route::prefix("/users")->group(function() {
    $users_controller = "App\Http\Controllers\user_auth";
    Route::get("/login",$users_controller."@login");
    Route::post("/login",$users_controller."@login");
    Route::get("/register",$users_controller."@register");
    Route::post("/register",$users_controller."@register");
    Route::get("/exit",$users_controller."@logout");
});

Route::group(["prefix"=>"/admins", "middleware"=>["App\Http\Middleware\admin_access"]],function() {
    $admin_controller = "App\Http\Controllers\admins";
    Route::get("/",$admin_controller."@main_page");
    Route::get("/addAdmin",$admin_controller."@add_admins");
    Route::get("/task/{task_type}/{id}",$admin_controller."@add_del_admins");
    Route::get("/addBlog",$admin_controller."@addBlog");
    Route::post("/addBlog",$admin_controller."@addBlog");
    Route::get("/delete/{id}",$admin_controller."@delete_blog");
    Route::get("/social_bar",$admin_controller."@social_bar");
    Route::post("/social_bar",$admin_controller."@social_bar");

});
