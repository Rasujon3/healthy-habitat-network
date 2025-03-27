<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Resident;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // get total product voted distinct product_id column
        $totalProductVoted = Vote::distinct('product_id')->count();
        $residentId = null;
        $userId = Auth::user()->id;
        $residentId = Resident::where('user_id', $userId)->first(['id']);
        if ($residentId) {
            $totalOwnAreaVotes = Vote::where('resident_id', $residentId->id)->count();
        }
        $authInfo = Auth::user();
        $totalProducts = Product::count();
//        dd('Auth::user()',Auth::user());
//        dd('$totalOwnAreaVotes',$totalOwnAreaVotes);
//        dd('$residentId',$residentId->id);
//        dd('$userId',$userId);
        return view('dashboard',compact('totalProductVoted','totalOwnAreaVotes',
            'totalProducts', 'authInfo'));
    }
}
