<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Progress;
class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['title', 'url', 'path', 'description', 'category_id', 'user_id', 'course_id'];

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}