<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthTrait;
class CheckUserValid
{
    use AuthTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (['email' => $request->email, 'password' => $request->password , 'status' =>'مفعل']){
            return $this->redirect($request);
        }
        else{
            return redirect()->back()->with('message','هناك خطأ في اسم المستخدم او كلمة المرور');
        }
      
    }
}
