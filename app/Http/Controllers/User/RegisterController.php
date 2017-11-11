<?php
//該如何整理程式碼呢？
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\User\UserController;
use App\User;


class RegisterController extends Controller
{
    
    public function index()
    {
        if(\Auth::check())
        {
            return redirect('posts'); 
        }
        return view('user/register');
    }
    public function register()
    {  
        //compact() 
        //bcrypt()
        //或許是最佳實踐吧？
        //$this->validate
        //不對，就會跳轉回本來的頁面，並返回 $errors
        if(\Auth::check())
        {
            return redirect('posts'); 
        }
        $this->validate(request(), [
            'name'     => 'required|min:3',
            'email'    => 'required|unique:users,email|email',
            'password' => 'required|min:6|max:20|confirmed'
        ]);        
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
    //    $avatar = " ";
        User::create(compact('name', 'email', 'password', 'avatar'));
        return redirect('login');
        /*
        //再看看最佳實踐如何
        //回頭看還真囉唆 
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
        }*/
 
    }
}
