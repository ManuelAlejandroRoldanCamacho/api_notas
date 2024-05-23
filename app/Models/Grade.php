<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class, 'subject_grade');
    }

    public function cycles(): BelongsToMany{
        return $this->belongsToMany(Cycle::class, 'grade_cycle');
    }

}
