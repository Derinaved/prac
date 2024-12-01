<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskControlletr extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
            'worker_id']);

        $data['user_id'] = Auth::user()->getAuthIdentifier();


        $task = Task::create($data);
        $tasks = Task::all();
        return redirect()->route('home', compact('tasks'));
    }
}
