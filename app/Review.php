<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function machineLearningData(){
        return $this->hasMany('App\MachineLearningData');
    }
    public function userAlgorithmPerformanceRating(){
        return $this->hasMany('App\UserAlgorithmPerformanceRating');
    }
}
