<?php

namespace App\Http\Requests;

use App\DTO\DivisiRequestDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class DivisiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> ['required', 'string'],
        ];
    }

    public function toDTO(): DivisiRequestDTO {
        return new DivisiRequestDTO((
            $this -> validated()
        ));
    }
}
