<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('create_task', compact('categories'));
    }

    public function store(Request $request)
    {
//        dd($request);
        $data = $request->only([
            'name',
            'price',
            'description',
            'category_id',
            ]);
        $filename = $request->file('img');
        $destinationPath = public_path() . '/image/product';
        $originalFile = $filename->getClientOriginalName();
        dd($request);
        $filename->move($destinationPath, $originalFile);
        $data['img'] = $originalFile;
        $product = Product::create($data);
        return redirect()->route('home');
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
