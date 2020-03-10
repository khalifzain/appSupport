<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'taskscategory_id'=>'required'
        ];
    }

    public function prepareForValidation()
    {
        $input = $this->all();
        $input['start_time'] = $this->get('start_time')->strtotime();

    }
}
