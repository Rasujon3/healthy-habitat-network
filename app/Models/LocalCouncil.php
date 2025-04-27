<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalCouncil extends Model
{
    use HasFactory;

    protected $table = 'local_councils';

    protected $fillable = [
        'user_id',
        'council_name',
        'phone',
        'address',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
