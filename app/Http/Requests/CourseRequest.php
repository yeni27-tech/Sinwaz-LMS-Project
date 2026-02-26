<?php

namespace App\Http\Requests;

use App\DTO\CourseRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            "divisi_id"=> ['required','exists:divisis,id'],
            'name' => ['required','string'],
            'description' => ['required','string'],
        ];
    }

    public function toDTO() : CourseRequestDTO {
        return new CourseRequestDTO(((
            $this -> validated()
        )));
    }
}
