<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        if (empty($request->all())) {
            $tasks = Task::all();
        }
        else{
            $filter = $request->only('statuses_id');
            if ($filter['statuses_id'] == "Статус заявки") {
                $tasks = Task::all();
            }
            else $tasks = Task::query()->where('statuses_id', '=', $filter)->get();
        }

        return view('admin', compact('tasks'));
    }
}
