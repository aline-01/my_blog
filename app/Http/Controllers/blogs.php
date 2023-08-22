<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\users;
use App\Models\comments;
use DB;


class blogs extends Controller
{
    public function single_page($blog_title) {
      $this_blog = blog::where("title",$blog_title)->get();
      if ($this_blog->count() == 0) {
        return view("blogs.404");
      }else {
        $writer = users::findOrFail($this_blog[0]["writer"]);
        DB::table("blog_view")->insert([
            "blog_id"=>$this_blog[0]["id"],
        ]);
        $blog_view = DB::table("blog_view")->where("blog_id",$this_blog[0]["id"])->get();
        $comments = comments::all()->where("is_accepted",1);
        return view("blogs.single",[
          "blog_title"=>$blog_title,
          "blog_content"=>$this_blog,
          "writer"=>$writer->username,
          "blog_view"=>$blog_view->count(),
          "comments"=>$comments,
        ]);
      }
    }
    public function add_comment() {
      Validator::make(request()->all(),[
          "user_comment"=>'required|min:6|max:255',
      ],[
          "user_comment.required"=>"متن نظر را وارد کنید",
          "user_comment.min:6"=>"متن نظر بسیار کوتاه است",
      ])->validate();
      if (is_null(request()->user_email)) { request()->user_email = "not set"; }
      if (is_null(request()->user_name)) { request()->user_name = "not set"; }
      comments::create([
        "blog_id"=>request()->blog_id,
        "text"=>request()->user_comment,
        "email"=>request()->user_email,
        "writer_name"=>request()->user_name,
      ]);
      return back();
    }
}
