<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\Models\users;
use Hash;

class user_auth extends Controller
{
    public function login() {
      if (is_null(request()->submit) == true) {
        return view("users.login.login");
      }else if (is_null(request()->submit) == false) {
        Validator::make(request()->all(),[
            "username"=>"required",
            "password"=>"required",
        ],[
          "username.required"=>"نام کاربری خود را وارد کنید",
          "password.required"=>"رمز عبور خود را وارد کنید",
          ])->validate();
          $hashed_password = Hash::make(request()->password);
          dd($hashed_password);
          $this_user = users::select("id","username")->where("username",request()->username)->where("password",$hashed_password)->get();
          if ($this_user->count() > 0) {
              $expire = time() * 5000;
              cookie()->queue(cookie('users_access', $this_user[0]->id, $expire));
              return redirect("/");

          }else {
              return back()->withErrors( 'کاربر پیدا نشد!')->withInput();
          }
      }
    }
    public function register() {
      if (is_null(request()->submit) == true) {
        return view("users.login.register");
      }else if (is_null(request()->submit) == false) {
        // dd(request()->all);
        $validator = Validator::make(request()->all(),[
          "name"=>"required|min:2",
          "username"=>"required|min:3|max:90|unique:users",
          "email"=>"required|email",
          "password"=>"required|min:8|max:245",
        ],[
          "name.required"=>"لطفا نام خود را وارد کنید",
          "name.min"=>"نام باید بیش از 3 کاراکتر باشد",
          "username.required"=>"لطفا نام کاربری خود را وارد کنید",
          "username.min"=>"نام کاربری باید بیشتر از 3 کاراکتر باشد",
          "username.unique"=>"نام کاربری قبلاً استفاده شده است",
          "email.required"=>"ایمیل خود را وارد کنید",
          "email.email"=>"لطفا یک آدرس ایمیل معتبر وارد کنید",
          "password.required"=>"رمز عبور خود را وارد کنید",
          "password.min"=>"رمز عبور باید حداقل ۸ کاراکتر باشد",
        ])->validate();
        $hashed_password = Hash::make(request()->password);
        users::create([
          "name"=>request()->name,
          "username"=>request()->username,
          "password"=>$hashed_password,
          "email"=>request()->email,
        ]);
        $login_value = [request()->username,request()->password];
        // $request->session()->put('key', 'value');
          session()->put("login_info",$login_value);
        return redirect("users/login");
      }
    }
    public function logout() {
      cookie()->queue(cookie::forget('users_access'));
      return redirect("/");
    }
}
