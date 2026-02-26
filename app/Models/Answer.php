<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Answer extends Model
{
    use Notifiable, HasFactory;

    protected $table = 'answers';

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    protected $fillable = [
        'is_correct',
        'question_id',
        'text',
    ];

    public function question() : BelongsTo {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
    public function quizAttemptAnswer() : HasMany {
        return $this->hasMany(QuizAttemptAnswer::class, 'answer_id', 'id');
    }
}
