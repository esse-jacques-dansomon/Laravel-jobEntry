<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon'];



    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }


    public function jobsCount(): int
    {
        return $this->hasMany(Job::class)->count();
    }



}
