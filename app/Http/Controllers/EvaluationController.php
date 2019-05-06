<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAlgorithmPerformanceRating;
use Auth;

class EvaluationController extends Controller
{
    public function evaluate(Request $request) {
        $evaluation = new UserAlgorithmPerformanceRating();
        $evaluation->user_id =  Auth::user()->id;
        $evaluation->review_id = $request->review;
        $evaluation->algorithm_primary_rating = (float) $request->initial_rating;
        $evaluation->user_performance_rating = (int) $request->user_rating;
        $evaluation->save();
        return redirect()->back()->with('status', 'Thank You, Evaluation Saved');
    }
}
