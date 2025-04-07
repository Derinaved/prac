<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function register(Request $request)
    {
//       return redirect(route('user.create'));
        return view('register');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($request->only('login', 'password'))) {
            return redirect()->route('home');
        }
        return back()
            ->withInput()
            ->withErrors([
                'login' => 'Такого пользователя не существует',
            ]);
    }

    public function registerCreate(Request $request)
    {
        $request->validate([
            'login' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|confirmed',
            'agreement' => 'required',
        ]);
        $data = $request->only('login', 'email', 'name', 'password');
        $data['password'] = Hash::make('password');
        $user = User::create($data);
        Auth::login($user);

        $tasks = Task::all();

        return redirect()->route('home');
    }

    public function logOut(Request $request)
    {
        Auth::logout();


        return redirect()->route('home');
    }
}
