<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

#[UseFactory(CourseFactory::class)]
class Course extends Model
{

    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'courses';

    protected $fillable = [
        'divisi_id',
        'tutor_id',
        'description',
        'name',
    ];

    public function divisi() : BelongsTo {
        return $this->belongsTo(Divisi::class,'divisi_id');
    }

    public function tutor() : BelongsTo {
        return $this->belongsTo(User::class,'tutor_id');
    }

    public function material(): HasMany  {
        return $this->hasMany(Material::class,'course_id');
    }
}
