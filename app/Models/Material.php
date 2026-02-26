<?php

namespace App\Models;

use Database\Factories\MaterialFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[UseFactory(MaterialFactory::class)]
class Material extends Model
{
    use Notifiable, HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'materials';

    protected $fillable = [
        'course_id',
        'yt_video_link',
        'name',
    ];

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
