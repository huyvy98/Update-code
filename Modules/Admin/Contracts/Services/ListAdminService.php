<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ListAdminService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param  Request  $request
     * @return Admin
     */
    public function saveAdmin(Request $request): Admin;

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return Admin
     */
    public function updateAdmin(Request $request, int $id): Admin;

    /**
     * @param  int  $id
     * @return Admin|null
     */
    public function editAdmin(int $id): ?Admin;

    /**
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

}
