<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'numeric',
            'image' => 'image|max:2048'
        ];
    }
}
