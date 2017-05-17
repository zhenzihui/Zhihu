<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   protected $fillable=['user_id','body','title'];
   public function topics()
   {
      return  $this->belongsToMany(Topic::class,'topic_question')->withTimestamps();
   }
}
