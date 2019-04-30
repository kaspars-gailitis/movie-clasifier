<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    public function machineLearningData(){
        return $this->hasMany('App\MovieReviewHistory');
    }
    public function userAlgorithmPerformanceRating(){
        return $this->hasMany('App\UserAlgorithmPerformanceRating');
    }
}
