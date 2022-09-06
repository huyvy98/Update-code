<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\UserService;
use Modules\User\Transformers\UserResource;

class UserController extends Controller
{
    /**
     * @var UserService $userService
     */
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return UserResource
     */
    public function show(): UserResource
    {
        $data = $this->userService->getUserById();

        return UserResource::make($data);
    }
}
