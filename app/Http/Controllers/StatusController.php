<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status_ok(Task $task)
    {
        return view('status_ok', compact('task'));
    }
    public function status_otk(Task $task)
    {
        return view('status_otkaz', compact('task'));
    }

    public function status_upd_ok(Request $request, Task $task)
    {
        $filename = $request->file('image');
        $destinationPath = 'C:/Users/dan/prak/public/image/';
        $originalFile = $filename->getClientOriginalName();
        $filename->move($destinationPath, $originalFile);

        $task = Task::find($task->id);
        $task->image = $originalFile;
        $task->statuses_id = 2;
        $task->save();
        return redirect()->route('filter');
    }

    public function status_upd_otk(Request $request, Task $task)
    {
        $task = Task::find($task->id);
        $description = $request->only('description');
        $task->description = $description['description'];
        $task->statuses_id = 3;
        $task->save();
//        dd($request->only('description'));
        return redirect()->route('filter');
    }
}
