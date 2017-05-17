<?php

namespace App;

use App\Http\Requests\QuestionRequest;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable=['name','desc','followers_count','questions_count'];
    public function questions()
    {
      return  $this->belongsToMany(Question::class,'topic_question')->withTimestamps();
    }
}
