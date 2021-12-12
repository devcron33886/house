<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
    ];

    public function cells()
    {
        return $this->hasMany(Cell::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
