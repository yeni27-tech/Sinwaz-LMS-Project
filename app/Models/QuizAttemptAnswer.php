<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class QuizAttemptAnswer extends Model
{
    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'quiz_attempt_answers';

    protected $fillable = [
        'quiz_attempt_id',
        'answer_id',
        'question_id',
        'answer_text',
    ];

    public function quizAttempt(): BelongsTo {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
    public function answer(): BelongsTo {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }
    public function question(): BelongsTo {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
