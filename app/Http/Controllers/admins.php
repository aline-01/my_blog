<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\blog;
use Illuminate\Support\Facades\Validator;
use DB;

class admins extends Controller
{
    public function main_page() {
        return view("admins_area.index");
    }
    public function add_admins() {
        $all_user = users::all();
        return view("admins_area/pages/add_admin",["all_user"=>$all_user]);
    }
    public function add_del_admins($task_type,$id) {
        // $user = users::findOrFail($id);
        if ($task_type == "add") {
          $access_key = 1;
        }else if ($task_type == "del") {
          $access_key = 0;
        }else {
          return redirect("/admins");
        }
        users::where("id",$id)->update(["is_admin_access"=>$access_key]);
        return back();
    }
    public function addBlog() {
        if (is_null(request()->submit)) {
          $all_blogs = blog::all();
          return view("admins_area.pages.addBlog",["all_blogs"=>$all_blogs]);
        }else {
          Validator::make(request()->all(),[
            "title"=>"required",
            "blog_img"=>"required",
            "content"=>"required",
          ],[
            "title.required"=>"عنوان را وارد کنید",
            "blog_img.required"=>"عکس را وارد کنید",
            "content.required"=>"محتوا را وارد کنید",
          ])->validate();
          $user_id = request()->cookie("users_access");
          //uploading file
           $file = request()->file('blog_img');
           $fileName = $file->getClientOriginalName() ;
           $upload_path = public_path()."/img/blog";
           $file->move($upload_path,$fileName);
           //->to upload file my first time in laravel
           blog::create([
            "title"=>request()->title,
            "picture"=>$fileName,
            "content"=>request()->content,
            "writer"=>$user_id,
          ]);
          return back();
        }
    }
    public function delete_blog($id) {
      $this_blog = blog::findOrFail($id);
      $this_blog->delete();
      return back();
    }
    public function social_bar() {
      if(is_null(request()->submit)) {
        return view("admins_area.pages.social_media");
      }else {
        $file = request()->file("picture");
        $fileName = $file->getClientOriginalName() ;
        $upload_path = public_path()."/img/site";
        $file->move($upload_path,$fileName);
        DB::table("site_info")->insert(
          [
            "site_picture"=>$fileName,
            "site_information"=>request()->descryption,
            "youtube"=>request()->Youtube,
            "twitter"=>request()->Twitter,
            "instagram"=>request()->Instagram,
            "aparat"=>request()->Aparat,
            "telegram"=>request()->Telegram,
          ]);
          return back();

      }

    }
    public function comments() {
      return view("admins_area.pages.comment");
    }

}
