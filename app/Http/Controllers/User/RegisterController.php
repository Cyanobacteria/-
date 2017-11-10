<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\User\UserController;
use App\User;


class RegisterController extends Controller
{
    
    public function index()
    {
        return view('user/register');
    }
    public function register()
    {   
        $password = request()->password;
        $password_confirmation = request()->password_confirmation;
        //確認密碼是否相同
        if( $password == $password_confirmation)
        {
            $user = new \App\User;
            $user->email = request()->email; 
            //要讓用戶輸入嗎? name
            $user->name = " ";
            //加密存入
            $user->password = bcrypt(request()->password); 
            $user->save();
            return redirect('/posts');
        } 
        else
        {
            return redirect('/register');
        }
    }
}
