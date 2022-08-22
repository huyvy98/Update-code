<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @param  Request  $request
     * @return Admin
     */
    public function saveAdmin(Request $request): Admin;

    /**
     * update admin
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Admin
     */
    public function updateAdmin(Request $request, int $id): Admin;

    /**
     * edit admin
     *
     * @param  int  $id
     * @return Admin|null
     */
    public function editAdmin(int $id): ?Admin;

    /**
     * delete admin
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

}
