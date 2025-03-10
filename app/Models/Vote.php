<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'product_id',
        'vote_value',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
