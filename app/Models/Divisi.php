<?php

namespace App\Models;

use Database\Factories\DivisiFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

#[UseFactory(DivisiFactory::class)]
class Divisi extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'divisis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];


    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
    public function quizzes(): HasMany {
        return $this->hasMany(Quiz::class,'divisi_id', 'id');
    }

    public function job() : HasMany {
        return $this->hasMany(Job::class,'divisi_id','id');
    }

    public function course() : HasMany {
        return $this->hasMany(Course::class,'divisi_id','id');
    }
}
