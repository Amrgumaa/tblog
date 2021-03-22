<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Color;
use App\Post;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'color_id',
    ];
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
    public function post()
    {
        return $this->hasmany('App\Post');
    }
}
