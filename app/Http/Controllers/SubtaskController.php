<?php

namespace App\Http\Controllers;

use App\Subtask;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests;

class SubtaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        $tasks = Task::all();
        return view('subtask.details', ['subtask' => Subtask::findOrFail($id), 'tasks' => $tasks]);
    }

    /**
     * [create description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function create(Request $request)
    {
        $tasks = Task::all();
        return view('subtask.details', ['tasks' => $tasks]);
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Requests\SubtaskCreate $request)
    {
        $subtask              = new Subtask;
        $subtask->task_id     = $request->task_id;
        $subtask->title       = $request->title;
        $subtask->description = $request->description;
        $subtask->status      = $request->status;

        $subtask->save();
        return redirect()->route('task.details', ['id' => $request->task_id]);

    }
    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Requests\SubtaskUpdate $request)
    {
        $subtask              = Subtask::find($request->id);
        $subtask->task_id     = $request->task_id;
        $subtask->title       = $request->title;
        $subtask->description = $request->description;
        $subtask->status      = $request->status;
        $subtask->save();

        return redirect()->route('task.details', ['id' => $request->task_id]);
    }
    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        $subtask = Subtask::find($id);
        $subtask->delete();
        return redirect()->route('tasks');
    }
}
