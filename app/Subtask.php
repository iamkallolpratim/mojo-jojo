<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    protected $table = 'sub_tasks';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
