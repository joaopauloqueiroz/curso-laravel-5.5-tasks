<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','cost','description','client_id'];

    //esse metodo vai retornar o cliente que e dono desse projeto
    /** N para 1
     * @return void
     */
    public function client(){
        return $this->belongsTo('App\Client');
    }

    
    /**
     * metodo de relacionamento N para N
     * @return void
     */

    public function tasks(){
        return $this->belongsToMany('App\Task');
    }
}
