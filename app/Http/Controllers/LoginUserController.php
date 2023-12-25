<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();

            $user['token'] = $user->createToken('auth user')->plainTextToken;

            return sendSuccessResponse(
                __('auth.success_login'),
                $user
            );
        }

        return sendFailedResponse(
            __('auth.failed'),
            null,
            401
        );
    }
}
