<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = ['name','email','age','photo','user_id'];

    public $rulesUpdate = [
        'name' => ['required', 'max:100', 'min:3'],
        'age' => ['required','integer']
    ];

    /**
     * Para retornar o cliente desse projeto de muitos para 1
     * por isso o metodo hasMany
     * @return void
     */
    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
