<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'product_name',
        'description',
        'health_benefits',
        'price_category',
        'product_type',
        'price',
        'is_available',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function positiveVotesCount()
    {
        return $this->votes()->where('vote_value', true)->count();
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
