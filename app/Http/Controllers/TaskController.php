<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::All();

        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $task = Task::create([
            'name' => $request->name,
        ]);

        $task->save();
        return redirect('/');
    }

    public function delete(int $id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect('/');
    }
}
