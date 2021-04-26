<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckRule;

class PostRequest extends FormRequest
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

            'slug' =>['required', 'string', new CheckRule()],
            'title' =>['required', 'min:10|max:250'],
            'content' =>['required', 'string'],
            'user_id' =>['required', 'numeric'],
            'name.*'=>['required', 'array'],
        ];
    }

    public function messages()
    {
        return [

            'title.min' => 'The lenght must be at least 10 characters',
            'title.max' => 'The lenght must be at least 250 characters',
            'user_id' => 'min:1|max:2',
            'name.*.required' => ' The Categories-Name field is required',
        ];
    }
}
