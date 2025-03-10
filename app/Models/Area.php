<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_name',
        'description',
        'council_contact',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
