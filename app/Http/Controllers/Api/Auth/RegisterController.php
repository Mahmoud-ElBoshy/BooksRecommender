<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\RegisterRequest;
use App\Services\UserService;

class RegisterController extends BaseApiController
{
    private $userService;


    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->create($data);

        return response()->json($user);
    }
}
