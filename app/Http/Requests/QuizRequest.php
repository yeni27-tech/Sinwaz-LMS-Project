<?php

namespace App\Http\Requests;

use App\DTO\QuizRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'divisi_id' => ['required', 'nullable', 'exists:divisis,id'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'is_active' => ['boolean'],
            'duration' => [ 'integer'],
        ];
    }

    public function toDTO(): QuizRequestDTO {
        return new QuizRequestDTO((
            $this -> validated()
        ));
    }
}
