<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorPost extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', "unique:authors,name,{$this->id},id"],
            'nationality' => ['required', 'string'],
            'born_date' => ['required', 'date'],
            'born_country' => ['required', 'string'],
            'death_date' => ['nullable', 'date'],
            'death_country' => ['nullable', 'string']
        ];
    }
}
