<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Video;
use App\Models\User;
class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comment', 'date', 'video_id', 'course_id', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Un comentario pertenece a un video
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    // Relación: Un comentario pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}