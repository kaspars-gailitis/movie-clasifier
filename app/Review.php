<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Review extends Model
{
    use SoftDeletes;
    public function machineLearningData(){
        return $this->hasMany('App\MovieReviewHistory');
    }
    public function userAlgorithmPerformanceRating(){
        return $this->hasMany('App\UserAlgorithmPerformanceRating');
    }
    public function formatTime() {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->format('d-m-Y H:i');
    }
    public function movie(){
        return $this->belongsTo('App\Movies');
    }
}
