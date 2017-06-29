<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class News extends Model
{
    const DEFAULT_PICTURE_NAME = 'default.jpg';

    protected $table = 'news';
    protected $hidden = [];

    public static function boot()
    {
        static::deleted(function(News $news) {
            $news->deletePicture();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function incrementViews()
    {
        $this->views = $this->views + 1;
        $this->save();
    }

    public function deletePicture()
    {
        if (!$this->picture || $this->picture === self::DEFAULT_PICTURE_NAME)
        {
            return;
        }

        File::delete(public_path('/img/news/' . $this->picture));
    }
}
