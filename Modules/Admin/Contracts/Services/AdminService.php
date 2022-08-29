<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\AdminRequest;

interface AdminService
{
    /**
     * get all admin
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * save admin to database
     *
     * @param AdminRequest $request
     * @return Admin
     */
    public function saveAdmin(AdminRequest $request): Admin;

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
    public function destroy(int $id): void;

}
