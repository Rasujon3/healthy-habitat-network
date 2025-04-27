<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sme extends Model
{
    use HasFactory;

    protected $table = 'smes';

    protected $fillable = [
        'user_id',
        'company_name',
        'contact_person',
        'phone',
        'address',
        'website',
        'business_type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
