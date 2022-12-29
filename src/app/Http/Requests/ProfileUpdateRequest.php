<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'zip_code' => 'nullable|string|max:8',
            'address' => 'required|string|max:100',
            'address_detail' => 'required|string|max:1000',
            'tel' => 'required|string|max:13',
            Rule::unique(User::class)->ignore($this->user()->id)
        ];
    }
}
