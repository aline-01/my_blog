<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\users;

class blogs extends Controller
{
    public function single_page($blog_title) {
      $this_blog = blog::where("title",$blog_title)->get();
      if ($this_blog->count() == 0) {
        return view("blogs.404");
      }else {
        $writer = users::findOrFail($this_blog[0]["writer"]);
        return view("blogs.single",[
          "blog_title"=>$blog_title,
          "blog_content"=>$this_blog,
          "writer"=>$writer->username,
        ]);
      }
    }
}
