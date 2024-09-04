<?php
namespace Modules\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Modules\Auth\Contracts\VerifyUser;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserStatusEnum;
use Psr\SimpleCache\InvalidArgumentException;

class LoginService
{
    /**
     * @throws InvalidArgumentException
     */
    public function loginSpa(array $validatedData)
    {
        return $this->loginUser($validatedData);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function loginMobile(array $validatedData)
    {
        return $this->loginUser($validatedData, true);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function loginUser(array $validatedData)
    {
        $errors = [];

        $user = User::query()
            ->where(AuthEnum::UNIQUE_COLUMN, $validatedData[AuthEnum::UNIQUE_COLUMN])
            ->first();

        if ($this->userNotFoundOrHaveWrongPassword($user, $validatedData['password'], $user->password ?? null)) {
            $errors['credentials'] = 'The provided credentials are incorrect.';
        }

        // Check if there are any errors and return with error messages
        if($errors)
        {
            return $errors;
        }

        auth()->login($user);

        session()->regenerate();

        return $user;
    }

    private function userNotFoundOrHaveWrongPassword($user, string $requestPassword, ?string $existingUserPassword = null): bool
    {
        return ! $user || ! Hash::check($requestPassword, $existingUserPassword);
    }

    public function isVerified($user): bool
    {
        return (bool) $user->{AuthEnum::VERIFIED_AT};
    }
}
