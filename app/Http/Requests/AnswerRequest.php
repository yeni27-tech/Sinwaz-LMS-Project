<?php

namespace App\Http\Requests;

use App\DTO\AnswerRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
                'question_id' => ['required', 'exists:questions,id'],
                'text' => ['string', 'nullable'],
                'is_correct' => ['boolean', 'nullable']
            ];

        // return [
        //     'text' => ['string', 'nullable'],
        // ];
    }

    public function toDTO(): AnswerRequestDTO {
        return new AnswerRequestDTO((
            $this -> validated()
        ));
    }
}
