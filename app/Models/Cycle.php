<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cycle extends Model
{
    use HasFactory;

    public function grades(): BelongsToMany{
        return $this->belongsToMany(Grade::class, 'grade_cycle');
    }

}
