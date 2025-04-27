<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Product;
use App\Models\Resident;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $authInfo = Auth::user();

        // Get total products
        $totalProducts = Product::count();

        // Get total products that have at least one vote
        $totalProductVoted = Vote::distinct('product_id')->count();

        // Get resident information
        $residentId = null;
        $totalOwnAreaVotes = 0;
        $resident = Resident::where('user_id', $userId)->first();
        if ($resident) {
            $residentId = $resident->id;
            $totalOwnAreaVotes = Vote::where('resident_id', $residentId)->count();
        }

        // Get active users count (users who voted in the last 30 days)
        $activeUsers = Resident::whereHas('votes', function($query) {
            $query->where('created_at', '>=', now()->subDays(30));
        })->count();

        $userTotalVotes = 0;
        if ($resident) {
            // Get user's total votes
            $userTotalVotes = Vote::where('resident_id',$resident->id)->count();
        }

        // Get recent activities (last 10 votes)
        $recentActivities = Vote::with('product')
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($vote) {
                return (object)[
                    'product_name' => $vote->product->product_name ?? 'Unknown Product',
                    'type' => $vote->product->product_type ?? 'Unknown Type',
                    'created_at' => $vote->created_at,
                    'status' => 'Completed'
                ];
            });

        // Get vote statistics for chart (votes per month for the last 6 months)
        $voteStats = $this->getVoteStatistics();

        // Get resident interest by area
        $areaInterest = $this->getAreaInterest();

        return view('dashboard', compact(
            'totalProductVoted',
            'totalOwnAreaVotes',
            'totalProducts',
            'authInfo',
            'activeUsers',
            'userTotalVotes',
            'recentActivities',
            'voteStats',
            'areaInterest'
        ));
    }

    private function getVoteStatistics()
    {
        $stats = [];
        $labels = [];

        // Get vote counts for the last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $labels[] = $month->format('M');

            $count = Vote::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $stats[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $stats
        ];
    }

    private function getAreaInterest()
    {
        // Get areas with vote counts
        $areas = Resident::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->take(5)
            ->get();

        $labels = $areas->pluck('name')->toArray();
        $data = $areas->pluck('votes_count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
