<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EmailController extends Controller
{
    public function verify($token)
    {


        $user = User::where('email_token',$token)->first();
        if(is_null($user))
        {
            \flash("邮箱验证失败",'danger');
            return redirect("/");
        }

        $user->isActive=1;

        $user->email_token=str_random(40);
        $user->save();
        Auth::Login($user);
        \flash("邮箱验证成功","success");
        return redirect(url('home'));
    }
}
