<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Ages extends Model
{
    protected $table = 'ages';
    protected $fillable = ['range', 'description'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}