<?php

namespace App\Http\Requests;

use App\DTO\JobRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'location' => ['required', 'string'],
            'education' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'description' => ['string'],
        ];
    }

    public function toDTO(): JobRequestDTO {
        return new JobRequestDTO((
            $this -> validated()
        ));
    }
}
