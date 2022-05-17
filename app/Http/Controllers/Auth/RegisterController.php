<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->all());
        // dd($user);
        Notification::create([
            'type' => Notification::TYPE_USER_CREATE,
            'target_id' => $user->id,
            'content' => 'Đăng kí user: <span class="font-weight-bold font-italic">' .$user->username .'</span>',
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Register success!');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['fullname'],
            'email' => $data['email'],
            'avatar' => config('view.path_avatar'),
            'password' => Hash::make($data['password']),
        ]);
    }
}
