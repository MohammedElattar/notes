<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Transformers\UserResource;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly LoginService $loginService) {}

    public function view()
    {
        return view('login');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function loginSpa(LoginRequest $request)
    {
        $result = $this->loginService->loginSpa($request->validated());

        if ($result instanceof User) {
            return redirect()->intended('/'); // Replace 'dashboard' with the appropriate route
        }

        return Redirect::back()->withErrors($result)->withInput();
        //        return $this->loginUser($result);
    }

    protected function loginUser($result): JsonResponse
    {
        if ($result instanceof User) {
            return $this->okResponse(
                new UserResource($result),
                translate_success_message('user', 'logged')
            );

        } elseif (isset($result['not_verified']) || isset($result['frozen'])) {
            $message = translate_error_message(
                'user',
                isset($result['not_verified'])
                    ? 'not_verified'
                    : 'frozen'
            );

            return $this->errorResponse(
                null,
                Response::HTTP_FORBIDDEN,
                $message,
                additional: ['verified' => ! isset($result['not_verified'])]
            );
        }

        return $this->errorResponse(
            null,
            Response::HTTP_UNAUTHORIZED,
            translate_word('wrong_credentials'),
        );
    }
}
