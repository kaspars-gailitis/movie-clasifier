<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Review;
use App\User;
use App\MovieReviewHistory;
use App\Http\Controllers\ReviewController;
use App\UserAlgorithmPerformanceRating;

class AdminController extends Controller
{
    protected $reviewController;
    public function __construct(ReviewController $reviewController)
    {
        $this->reviewController = $reviewController;
    }
    public function index() { //Possible actions
        return view('admin.index');
    }

    public function updateReviewReting(Request $request) {
        $evaluation = new MovieReviewHistory();
        $evaluation->review_id = $request->review;
        $evaluation->movie_id = $request->movie;
        $evaluation->previous_rating = (int) $request->initial_rating;
        $evaluation->updated_rating = (int) $request->upadate_to;
        $evaluation->save();

        $review = Review::findOrFail($request->review);
        $review->final_rating = (int) $request->upadate_to;
        $review->save();
        $this->reviewController->updateMovieRating((int) $request->movie);

        return redirect()->back()->with('status', 'Rating Changed');
    }

    public function listUsers() {
        $users = User::orderBy('updated_at', 'DESC')->get();
        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function algorithPerformance() { //includes relearning option
        $positiveCount = UserAlgorithmPerformanceRating::where('user_performance_rating', '=', 1)->count();
        $negativeCount = UserAlgorithmPerformanceRating::where('user_performance_rating', '=', 0)->count();
        return view('admin.algorithm', [
            'positiveCount' => $positiveCount,
            'negativeCount' => $negativeCount
        ]);
    }

    public function changeRating() {

    }
}
