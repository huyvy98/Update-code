<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\AdminRequest;
use Modules\Admin\Http\Requests\AdminRequestUnique;

interface AdminService
{
    /**
     * get all admin
     *
     * @return LengthAwarePaginator
     */
    public function getAdmin(): LengthAwarePaginator;

    /**
     * save admin
     *
     * @param AdminRequestUnique $request
     * @return Admin
     */
    public function saveAdmin(AdminRequestUnique $request): Admin;

    /**
     * update admin
     *
     * @param AdminRequest $request
     * @param int $id
     * @return Admin
     */
    public function updateAdmin(AdminRequest $request, int $id): Admin;

    /**
     * edit admin
     *
     * @param int $id
     * @return Admin|null
     */
    public function editAdmin(int $id): ?Admin;

    /**
     * delete admin
     *
     * @param int $id
     * @return void
     */
    public function destroyAdmin(int $id): void;

}
