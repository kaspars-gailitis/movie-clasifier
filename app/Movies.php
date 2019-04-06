<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public function machineLearningData(){
        return $this->hasMany('App\MachineLearningData');
    }
}
