<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name', 'name', 'description', 'task_date', 'taskscategory_id', 'created_by', 'start_time', 'end_time'];

    public function tasksCategory(){
        return $this->belongsTo('App\TasksCategory', 'taskscategory_id');
    }

}
