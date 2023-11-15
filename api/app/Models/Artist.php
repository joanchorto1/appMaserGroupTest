<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['name','description', 'age','style'];
    public function concerts()
    {
        return $this->hasMany(ConcertP::class, 'artists');
    }
}
