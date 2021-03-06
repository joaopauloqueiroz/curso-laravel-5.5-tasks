<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['subject', 'made', 'description'];
    /**
     * método da relação N para N
     *
     * @return void
     */
    
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

}
