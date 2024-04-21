<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv',
        'photo',
        'coverLetter',
        'portfolio',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }

    public function testimony(): HasOneThrough
    {
        return $this->hasOneThrough(Testimony::class, User::class);
    }


}
