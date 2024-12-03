<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

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
            'categories_id',
            'image',
            ]);

        $data['user_id'] = Auth::user()->getAuthIdentifier();
        $filename = $data['image'];
        $destinationPath = 'public/img/';
        $originalFile = $filename->getClientOriginalName();
        $filename->move($destinationPath, $originalFile);

        $data['image'] = $filename;
        $data['statues_id'] = 1;

        $task = Task::create($data);
        $tasks = Task::all();
        return redirect()->route('home', compact('tasks'));
    }
}
