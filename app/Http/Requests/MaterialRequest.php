<?php

namespace App\Http\Requests;

use App\DTO\MaterialRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'course_id' => ['required', 'exists:courses,id'],
            'name' => [ 'required', 'string'],
            'yt_video_link' => ['required', 'string'],
        ];
    }

    public function toDTO() {
        return new MaterialRequestDTO((
            $this -> validated()
        ));
    }
}
