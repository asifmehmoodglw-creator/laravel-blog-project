<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class CardController extends Controller
{
    public function rate(Request $request){
        // dd($request->all());
        $request->validate([
        'card_id' => 'required|integer',
        'rating'  => 'required|integer|min:1|max:5'
    ]);

    Rating::updateOrCreate(
        [
            'card_id' => $request->card_id, 
            'user_id' => auth()->id() ?? $request->ip()
        ],
        [
            'rating' => $request->rating
        ]
    );
     return response()->json([
        'success' => true,
        'message' => 'Rating saved successfully!',
        'rating' => $request->rating
    ]);
    
 }
}