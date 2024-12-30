<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Ages;
class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'age_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function age()
    {
        return $this->belongsTo(Ages::class, 'age_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }
}