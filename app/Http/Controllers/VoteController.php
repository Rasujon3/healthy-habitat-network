<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Product;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Store a newly created vote in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'vote_value' => 'required|boolean',
        ]);

        // Check if product is available
        $product = Product::findOrFail($request->product_id);
        if (!$product->is_available) {
            return back()->with('error', 'This product is currently unavailable for voting.');
        }

        // Get current resident
        $resident = auth()->user()->resident;
        if (!$resident) {
            return redirect()->route('resident.create')
                ->with('error', 'You need to complete your resident profile before voting.');
        }

        // Check if resident has already voted for this product
        $existingVote = Vote::where('resident_id', $resident->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingVote) {
            // Update existing vote
            $existingVote->update(['vote_value' => $request->vote_value]);
            $message = 'Your vote has been updated.';
        } else {
            // Create new vote
            Vote::create([
                'resident_id' => $resident->id,
                'product_id' => $request->product_id,
                'vote_value' => $request->vote_value,
            ]);
            $message = 'Your vote has been recorded.';
        }
//        dd($message);

        return back()->with('success', $message);
    }

    /**
     * Display most popular products based on votes
     */
    public function popularProducts()
    {
        // Get products with vote counts
        $products = Product::withCount(['votes as positive_votes' => function ($query) {
            $query->where('vote_value', true);
        }])
            ->orderBy('positive_votes', 'desc')
            ->take(10)
            ->with('business')
            ->get();

        return view('votes.popular-products', compact('products'));
    }
    public function destroy($id)
    {
        $existVote = Vote::where('id', $id)->exists();
        if (!$existVote) {
            return back()->with('error', 'This vote does not exist.');
        }

        Vote::where('id', $id)->delete();
        return back()->with('success', 'Your vote has been removed.');
    }
}
