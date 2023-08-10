<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class admin_access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_access = request()->cookie("users_access");
        if (is_null($user_access)) {
          return redirect("/");
        }else {
          $this_user = DB::table("users")->where("id",$user_access)->get();
          if ($this_user->count() == 0) {
            return redirect("/");
          }else  {
              if ($this_user[0]->is_admin_access == 0) {
                return redirect("/");
              }
          }
        }

        return $next($request);
    }
}
