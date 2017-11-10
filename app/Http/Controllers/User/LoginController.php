<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index()
    {
        if(\Auth::check())
        {
            return redirect('posts'); 
        }
        return view('user/login');
    }
    public function login()
    {//1.數據驗證2.羅即實現3.渲染
        //dd(request()->all());
        //dd(boolval(1));
        //dd(boolval(0));
        if(\Auth::check())
        {
            return redirect('posts'); 
        }
        if(request('is_remember') == 'on')
        {
            $is_remember = true;
        }
        else
        {
            $is_remember = false;
        }
        //dd($is_remember);
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            //'is_remember' => 'integer'
        ]);
        
        $user = request(['email', 'password']);
        //$is_remember = boolval(request('is_remember'));
        //登入數據 是否記住
        if (\Auth::attempt($user, $is_remember)) {
            return redirect('/posts');
        }
        else
        {
            return \Redirect::back()->withErrors('信箱或密碼錯誤');   
        }
    }
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }
    
}
