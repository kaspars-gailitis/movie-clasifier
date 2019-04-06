<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineLearningData extends Model
{
    public function review(){
        return $this->belongsTo('App\Review');
      }
  
      public function movie(){
        return $this->belongsTo('App\Movies');
      }

    public function formatTime() {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->format('d-m-Y H:i');
    }
}
