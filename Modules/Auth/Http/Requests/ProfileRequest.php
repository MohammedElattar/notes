<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Enums\AuthEnum;

class ProfileRequest extends FormRequest
{
    use HttpResponse;

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $uniqueColumn = AuthEnum::UNIQUE_COLUMN;

        return [
            'name' => ValidationRuleHelper::stringRules(),
            $uniqueColumn => ValidationRuleHelper::emailRules([
                'unique' => ValidationRuleHelper::getUniqueColumn(
                    true,
                    (new User)->getTable(),
                    auth()->id(),
                ),
                'email' => 'email',
            ]),
            'avatar' => ValidationRuleHelper::storeOrUpdateImageRules(true),
        ];
    }

    /**
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
