<?php

namespace App\Models;

use Database\Factories\QuizAttemptFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[UseFactory(QuizAttemptFactory::class)]
class QuizAttempt extends Model
{
    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'quiz_attempts';

    protected $fillable = [
        'quiz_id',
        'user_id',
        'score',
        'status',
        'submitted_at',
    ];

    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
