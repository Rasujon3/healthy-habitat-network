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


    /**
     * Get area-wise positive vote counts for this product
     *
     * @return Collection
     */
    public function getAreaVoteCounts()
    {
        return \DB::table('service_votes')
            ->select('areas.area_name as area_name', \DB::raw('COUNT(*) as vote_count'))
            ->join('residents', 'service_votes.resident_id', '=', 'residents.id')
            ->join('areas', 'residents.area_id', '=', 'areas.id')
            ->where('service_votes.service_id', $this->id)
            ->where('service_votes.vote_value', true)
            ->groupBy('areas.area_name')
            ->orderBy('vote_count', 'desc')
            ->get();
    }

    /**
     * Scope a query to only include products from a specific area.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $areaId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromArea($query, $areaId)
    {
        return $query->whereHas('votes', function ($query) use ($areaId) {
            $query->whereHas('resident', function ($q) use ($areaId) {
                $q->where('area_id', $areaId);
            });
        });
    }

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
