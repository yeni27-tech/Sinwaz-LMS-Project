<?php

namespace App\Http\Requests;

use App\DTO\QuestionRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'quiz_id' => ['required', 'exists:quizzes,id'],
            'text' => ['string'],
            'order_number' => ['integer']
        ];
    }

    public function toDTO() {
        return new QuestionRequestDTO((
            $this->validated()
        ));
    }
}
