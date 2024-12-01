<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = Auth::user();
        $users = User::all();
        $work_tasks = Task::query()->where('worker_id', '=', Auth::id())->get();
        $created_tasks = Task::query()->where('user_id', '=', Auth::id())->get();
//        dd($created_tasks, $work_tasks);
        return view('profile', compact('user', 'users', 'work_tasks', 'created_tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->only('login', 'password'));
        return redirect()->route('login');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
