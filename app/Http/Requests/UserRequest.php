<?php

namespace App\Http\Requests;

use App\DTO\UserRequestDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => ['required', 'string'],
                'number_phone' => ['required','min:9'],
                'divisi_id' => ['required', 'exists:divisis,id'],
                'email' => ['required', 'email','unique:users,email'],
                'password' => ['required', 'min:8','string'],
            ];
        };

         return [
                'name' => ['required', 'string'],
                'number_phone' => ['required','min:9'],
                'divisi_id' => ['required', 'exists:divisis,id'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8','string'],
            ];
    }

    public function toDTO() {
        return new UserRequestDTO((
            $this -> validated()
        ));
    }
    //  protected function failedValidation(Validator $validator) {
    //         "errors" => $validator->getMessageBag()
    //     ],409));
    // }
}
