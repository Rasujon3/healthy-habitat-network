<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVote extends Model
{
    use HasFactory;

    protected $table = 'service_votes';

    protected $fillable = [
        'resident_id',
        'service_id',
        'vote_value',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
