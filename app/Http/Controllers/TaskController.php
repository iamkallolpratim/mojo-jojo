<?php

namespace App\Http\Controllers;

use App\Task;
use App\Subtask;
use Illuminate\Http\Request;
use App\Http\Requests;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * [show description]
     * @param  Request $request [description]
     * @param  boolean $id      [description]
     * @return [type]           [description]
     */
    public function show(Request $request, $id = false)
    {
        if ($id) {
            $subtasks = Subtask::where('task_id',$id)->get();
            return view('task.details', ['task' => Task::findOrFail($id),'subtasks'=>$subtasks]);
        }

        return view('task.manage', ['tasks' => Task::with('subtasks')->get()]);
    }

    /**
     * [create description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function create(Request $request)
    {
        return view('task.details');
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Requests\TaskCreate $request)
    {
        $task              = new Task;
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->status      = $request->status;

        $task->save();
        return redirect()->route('tasks');

    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Requests\TaskUpdate $request)
    {
        $task = Task::find($request->id);
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->status      = $request->status;
        $task->save();

        return redirect()->route('tasks');
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        $deleteSubtasks = Subtask::where('task_id', $id)->delete();
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks');
    }

}
