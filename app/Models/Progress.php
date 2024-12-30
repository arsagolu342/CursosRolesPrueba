<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
class Progress extends Model
{
    protected $table = 'progress';
    protected $fillable = ['video_id', 'user_id', 'minuto'];

    public function video()
    {
        return $this->belongsTo(Video::class); // Relación de "pertenece a"
    }
}