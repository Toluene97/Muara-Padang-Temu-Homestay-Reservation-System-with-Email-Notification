<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps=true;

    // create relationship between blog post and user.
    public function user(){
        return $this->belongsTo('App\User');       //  model\user   A single post belong to a single user
    }
}
