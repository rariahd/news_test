<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JWTAuth;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.JWTAuth::parseToken()->authenticate()->id.',id,deleted_at,NULL',
            'password' => 'string|min:6',
            'summary' => 'required|string|min:20',
            'address' => 'required|string',
        ];
    }
}
