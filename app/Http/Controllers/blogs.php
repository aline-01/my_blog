<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\blog;

class blogs extends Controller
{
    public function single_page($blog_title) {
      $this_blog = blog::where("title",$blog_title)->get();
      if ($this_blog->count() == 0) {
        return view("blogs.404");
      }else {
        return view("blogs.single",[
          "blog_title"=>$blog_title,
          "blog_content"=>$this_blog,
        ]);
      }
    }
}
