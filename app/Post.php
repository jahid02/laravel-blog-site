<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function relAuthor(){
        return $this->belongsTo('App\Author','author_id', 'id');
    }

    public function relCategory()
    {
        return $this->belongsTo('App\Category','category_id', 'id');

    }


}
