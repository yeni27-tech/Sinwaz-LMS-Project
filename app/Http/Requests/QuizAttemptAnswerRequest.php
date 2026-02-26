<?php

namespace App\Http\Requests;

use App\DTO\QuizAttemptAnswerRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class QuizAttemptAnswerRequest extends FormRequest
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
            "quiz_attempt_id"=> ['required', 'exists:quiz_attempts,id'],
            "answer_id"=> ['string', 'nullable', 'exists:answers,id'],
            "question_id"=> ['required', 'exists:questions,id'],
            'answer_text' => ['string'],
        ];
    }

    public function toDTO() {
        return new QuizAttemptAnswerRequestDTO((
            $this -> validated()
        ));
    }
}
