<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = User::query()->where('login', '=', $request->only(['login']))
            ->where('password', '=', $request->only(['password']))->get();
//        dd(empty($user[0]));
        if (empty($user[0])) {
            return redirect('/');
        }
        Auth::login($user[0]);
        return redirect('');
    }

    public function registerCreate(Request $request)
    {
        $data = $request->only('login', 'password');
        $user = User::create($data);
        Auth::login($user);

        $tasks = Task::all();

        return redirect()->route('home', compact('tasks'));
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        $tasks = Task::all();

        return view('/home', compact('tasks'));
    }
}
