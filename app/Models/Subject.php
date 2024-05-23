<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grades(): BelongsToMany{
        return $this->belongsToMany(Grade::class, 'subject_grade');        
    }

    public function notes(): HasMany{
        return $this->hasMany(Note::class);        
    }
}
