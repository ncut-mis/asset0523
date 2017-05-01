<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            //
            'name'=>'required|min:3|max:50',
            'category'=>'required',
            'staues'=>'required|min:3|max:20',
            'keeper'=>'required',
            'lendable'=>'required|boolean',
            'location'=>'required|min:3|max:50',
            'vendor'=>'required',
            'warranty'=>'required',
            'title'=>'required|min:3|max:255',
            'content'=>'required',
            'is_feature'=>'required|boolean',
        ];
    }
}
