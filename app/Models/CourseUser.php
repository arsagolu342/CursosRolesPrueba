<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class CourseUser extends Model
{
    protected $table = 'course_user';
    protected $fillable = ['course_id', 'user_id', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Aquí se asegura la relación con el modelo User.
    }
}