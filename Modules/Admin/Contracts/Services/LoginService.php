<?php

namespace Modules\Admin\Contracts\Services;

use Illuminate\Http\RedirectResponse;
use Modules\Admin\Http\Requests\LoginRequest;

interface LoginService
{
    /**
     * Login admin
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse;
}
