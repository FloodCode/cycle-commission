<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function incrementViews()
    {
        $this->views = $this->views + 1;
        $this->save();
    }
}
