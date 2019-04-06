<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAlgorithmPerformanceRating extends Model
{
    public function review(){
        return $this->belongsTo('App\Review');
      }
  
      public function user(){
        return $this->belongsTo('App\User');
      }

    public function formatTime() {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->format('d-m-Y H:i');
    }
}
