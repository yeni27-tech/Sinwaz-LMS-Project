<?php

namespace App\Http\Requests;

use App\DTO\QuizAttemptRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class QuizAttemptRequest extends FormRequest
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
            "quiz_id"=> ['required', 'string', 'exists:quizzes,id'],
            "user_id"=> ['required', 'string', 'exists:users,id'],
            "score"=> ['integer', 'required'],
            "status"=> ['string','required'],
            "submitted_at" => ['required']
        ];
    }

    public function toDTO() : QuizAttemptRequestDTO {
        return new QuizAttemptRequestDTO((
            $this -> validated()
        ));
    }
}
