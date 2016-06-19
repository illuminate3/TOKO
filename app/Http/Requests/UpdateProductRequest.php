<?php

namespace App\Http\Requests;

class UpdateProductRequest extends StoreProductRequest
{
    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }
}