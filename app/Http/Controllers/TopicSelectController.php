<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicSelectController extends Controller
{
    public function getSuggestion(Request $request)
    {
        $input=$request->all()['q'];
        $resp=[];

        $topics = Topic::where('name','like','%'.$input.'%')->get();
        foreach ($topics as $topic)
        {
            $resp[]=["id"=>$topic->id,'text'=>$topic->name];
        }
        return json_encode($resp);

    }
}
