<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Topic;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Auth;
use Repository\QuestionRepository;

class QuestionController extends Controller
{
  protected  $questionRespository;

    public function __construct()
    {
        $this->middleware('userCheck')->except(['show','index']);
        $this->questionRespository=new QuestionRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->questionRespository->index(5);
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {

        $question= new Question();
        $question->title=$request->get('title');
        $question->body=$request->get('body');
        $question->user_id=Auth::user()->id;
        $question->save();

        //更新话题的问题数
        $topicIds = $request->get('topic');
        collect($topicIds)->map(function ($id)
        {
            Topic::find($id)->increment('questions_count');

        });
        $question->topics()->attach($topicIds);
        flash('发布成功')->overlay();
        return redirect(url('question',$question->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=$this->questionRespository->getElementById($id);
        return view('question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
