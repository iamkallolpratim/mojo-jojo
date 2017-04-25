<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function subTasks()
    {
      return $this->hasMany(Subtask::class, 'task_id');
    }
}
