<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Review;
use App\Movies;
use Auth;

class ReviewController extends Controller
{
    const PYTHON_PATH = "/Users/kasparsg/.virtualenvs/env3.6/bin/python";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showList($pageNumber = 0) {
        $reviews = Review::where('id', '>', (10*$pageNumber-1))->take(50)->get();
        return view('list_reviews', [
            'reviews' => $reviews
        ]);
    }
    public function listMyReviews() {
        $reviews = Review::where('user_id', Auth::user()->id)->take(50)->get();
        return view('list_reviews', [
            'reviews' => $reviews
        ]);
    }
    public function editReview($id = NULL) {
        if ($id == NULL) return view('new_review');

        $review = Review::findOrFail($id);
        if($review->user_id == Auth::user()->id){
            return view('new_review', [
                'review' => $review,
            ]);
        }
        return redirect('home');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'movie' => 'bail|required',
            'body' => 'bail|required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $review = new Review();
        $review->review_text = $request->body;
        $review->movie_id = $request->movie;
        $review->user_id = Auth::user()->id;
        $review->final_rating = -1;
        $review->raw_rating = -1;
        $review->save();

        $command = escapeshellcmd(ReviewController::PYTHON_PATH." ". app_path("/Http/Controllers/TensorflowModel/Python/Main.py $review->id"));
        exec($command, $output, $status);
        return redirect()->back();
    }
}
