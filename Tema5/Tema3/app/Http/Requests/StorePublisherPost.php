<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublisherPost extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', "unique:publishers,name,{$this->id},id"],
            'status' => ['required', 'string', 'regex:/Active|Inactive/'],
            'foundation_year' => ['required', 'integer', 'min:1901', 'max:' . date("Y")],
            'origin_country' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'status.regex' => 'The status can be only Active or Inactive'
        ];
    }
}
