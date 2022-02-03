<?php

namespace App\Http\Requests\Backend\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required',
            'company_name' => 'required',
            'salary_details' => 'required',
            'description' => 'required',
            'expiration_date' => 'required',
            'published_date' => 'required',
            'is_published' => 'nullable',
            'tag' => 'nullable',
            'type' => 'nullable',
            'country' => 'nullable',
        ];
    }
}
