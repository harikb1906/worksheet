<?php

namespace App;

use Illuminate\Database\Eloquent\Model, Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'title', 'description' , 'completed'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task' , 'project_id');
    }

    public function managers()
    {
        return $this->belongsToMany('App\User' , 'project_user' )->withPivotValue('role', 2);
    }

    public function members()
    {
        return $this->belongsToMany('App\User' , 'project_user' )->withPivotValue('role', 1);
    }
}
