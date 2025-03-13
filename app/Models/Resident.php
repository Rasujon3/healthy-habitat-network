<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Resident extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'name',
        'age_group',
        'gender',
        'interest_areas',
        'email',
    ];

    protected $casts = [
        'interest_areas' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
