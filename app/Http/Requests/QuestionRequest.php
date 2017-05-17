<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:6|max:50',
            'body'=>'required|min:25|',
        ];
    }
    public function messages()
    {
        return[
            'title.require'=>'必须填一个标题',
            'title.min'=>'至少6个字',
            'title.max'=>'标题最多50字',
            'body.require'=>'必须填问题内容',
            'body.min'=>'至少25个字',


        ];
    }
}
