<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable =['user_id','name','title','details'];

    public static function create(array $all)
    {

    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
