<?php

namespace App\Http\Controllers\Auth;

use App\ActiveCode;
use App\Http\Controllers\Controller;
use App\Notifications\LoginToWebsite as LoginToWebsiteNotification;
use App\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function showToken(Request $request)
    {

        if(! $request->session()->has('auth')) {
            return redirect(route('loginuser'));
        }

        $request->session()->reflash();

        return view('Site.auth.token');
    }

    public function token(Request $request)
    {
        $token = $request->input('code');


        if(! $request->session()->has('auth')) {
            return redirect(route('loginuser'));
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));
        $status = ActiveCode::verifyCode($token , $user);

        if(! $status) {
//            alert()->error('کد صحیح نبود');
            return redirect(route('loginuser'));
        }

        if(auth()->loginUsingId($user->id)) {
            $user->activeCode()->delete();
            return redirect(url('reservation'));
        }

        return redirect(route('loginuser'));
    }
}
