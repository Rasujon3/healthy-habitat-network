<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'description',
        'health_benefits',
        'price_category',
        'certifications',
        'delivery_mode',
        'service_duration',
        'is_available',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function votes()
    {
        return $this->hasMany(ServiceVote::class);
    }

    public function positiveVotesCount()
    {
        return $this->votes()->where('vote_value', true)->count();
    }
}
