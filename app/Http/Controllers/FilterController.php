<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        if (empty($request->all())) {
            $messages = Message::all();
        }
//        else{
//            $filter = $request->only('statuses_id');
//            if ($filter['statuses_id'] == "Статус заявки") {
//                $tasks = Task::all();
//            }
//            else $tasks = Task::query()->where('statuses_id', '=', $filter)->get();
//        }

        return view('admin', compact('messages'));
    }
}
