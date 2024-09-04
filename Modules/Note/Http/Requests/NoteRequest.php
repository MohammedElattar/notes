<?php

namespace Modules\Note\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;

class NoteRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'content' => ValidationRuleHelper::longTextRules(),
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Content is required',
            'content.string' => 'Content must be a valid string',
        ];
    }
}
