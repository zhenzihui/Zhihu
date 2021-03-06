<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/16
 * Time: 13:50
 */

namespace App\Repository;


use App\Http\Requests\QuestionRequest;
use App\Question;

class QuestionRepository
{
    public function index($Num_Per_Page)
    {
     return   Question::where('id','>','0')->orderBy('created_at','desc')->with('topics')->paginate($Num_Per_Page);
    }

    public function getElementById($id)
    {
        return Question::find($id);
    }

    public function edit(QuestionRequest $request)
    {
        $input=$request->all();


    }
}