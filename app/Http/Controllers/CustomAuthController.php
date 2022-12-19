<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('front-end.users.signin');
    }

    public function signin(Request $request)
    {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                return view('back-end.index.index');
            }
            return back()->withErrors([
                'email' => 'Địa chỉ Email không hợp lệ.',
            ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

    public function registration()
    {
        return view('front-end.users.signup');
    }

    public function customRegistration(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        //Đăng nhập luôn khi so đăng kí tài khoản
        auth()->login($user);

        return redirect('/')->with('success', "Bạn đăng kí tài khoản thành công");
    }

}
