<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'task_id' , 'body' ,
    ];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
