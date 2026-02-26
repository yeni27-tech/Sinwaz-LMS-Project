<?php

namespace App\Models;

use Database\Factories\JobFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[UseFactory(JobFactory::class)]
class Job extends Model
{
    use Notifiable,HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'job';

    protected $fillable = [
        'name',
        'description',
        'type',
        'location',
        'education',
        'experience',
    ];


    public function jobMaker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_maker_id', 'id');
    }
}
