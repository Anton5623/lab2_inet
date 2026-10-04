<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:'.config('lab2.title_max'),
            'provider' => 'required|string|in:Amazon,Microsoft,Google,Cisco,CompTIA,PMI,AXELOS,Scrum.org,Oracle',
            'questions' => 'required|integer|min:10|max:300',
            'minutes' => 'required|integer|min:15|max:400',
            'notes' => 'nullable|string|min:'.config('lab2.notes_min').'|max:1000',
            'urgent' => 'boolean',
            'justification' => 'required_if:urgent,1|nullable|string|min:30|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Назва іспиту обов\'язкова.',
            'title.max' => 'Назва не може перевищувати :max символів.',
            'provider.in' => 'Оберіть провайдера зі списку.',
            'justification.required_if' => 'Обґрунтуйте терміновість (мін. 30 символів).',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'назва',
            'provider' => 'провайдер',
            'justification' => 'обґрунтування',
        ];
    }
}
