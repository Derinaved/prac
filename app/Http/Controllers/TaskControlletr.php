<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class TaskControlletr extends Controller
{
    public function index()
    {
        return view('create_task');
    }

    public function store(Request $request)
    {
//        dd($request);
        $data = $request->only([
            'title',
            'description',
            'categories_id',
            ]);
        $filename = $request->file('image');
        $destinationPath = 'C:/Users/dan/prak/public/image/';
        $originalFile = $filename->getClientOriginalName();
        $filename->move($destinationPath, $originalFile);
        $data['image'] = $originalFile;
        $data['statuses_id'] = 1;
        $data['user_id'] = Auth::user()->getAuthIdentifier();

        $task = Task::create($data);
        return redirect()->route('profile', Auth::user()->getAuthIdentifier());
    }

    public function show(Task $task)
    {
        return view('task', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('edit_task', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $filename = $request->file('image');
        $destinationPath = 'C:/Users/dan/prak/public/image/';
        $originalFile = $filename->getClientOriginalName();
        $filename->move($destinationPath, $originalFile);

        $data = $request->only(['title',
            'description',
            'categories_id'
        ]);

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->categories_id = $data['categories_id'];
        $task->image = $originalFile;

        $task->save();

        return redirect()->route('profile', Auth::user()->getAuthIdentifier());
    }

    public function destroy(Request $request, Task $task)
    {
        $data = $request->only('delete');
        if ($data['delete']) {
            $task->delete();
        }
        return redirect()->route('profile', Auth::user()->getAuthIdentifier());
    }

}
