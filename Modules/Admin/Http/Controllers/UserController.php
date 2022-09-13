<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\UserService;
use Modules\Admin\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    public UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     *Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = $this->userService->getUser();

        return view('admin::user.index', compact('users'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->userService->destroyUser($id);

        return Redirect::route('user.index')->with('message', 'Đã xóa thành công');
    }
}
