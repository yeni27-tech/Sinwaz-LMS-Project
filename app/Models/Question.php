<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'questions';

    protected $fillable = [
        'quiz_id',
        'text',
        'order_number',
    ];

    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function answer() : HasMany {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
