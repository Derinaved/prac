<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('filter');
    }

    public function show(Task $task)
    {
        dd($task);
    }

    public function destroy(Category $category)
    {
//        dd($category);
        $tasks = Task::query()->where('categories_id', '=', $category->id)->get();
        foreach ($tasks as $task) {
            $task->delete();
        }
        $category->delete();
        return redirect()->route('filter');
    }

    public function create()
    {
        return view('create_category');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        Category::create($request->only('title'));
        return redirect()->route('filter');
    }
}
