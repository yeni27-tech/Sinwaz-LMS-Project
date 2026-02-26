<?php

namespace App\Models;

use Database\Factories\QuizFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


#[UseFactory(QuizFactory::class)]
class Quiz extends Model
{
    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'quizzes';

    protected $fillable = [
        'divisi_id',
        'name',
        'description',
        'duration',
        'is_active',
    ];
    public function divisi() : BelongsTo {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }

    public function question() : HasMany {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    public function quizAttempt() : HasMany {
        return $this->hasMany(QuizAttempt::class, 'quiz_id', 'id');
    }
}
