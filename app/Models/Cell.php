<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'name',
        
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
