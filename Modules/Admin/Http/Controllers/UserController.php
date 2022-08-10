<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\UserService;
use PHPUnit\Exception;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource
     */
//    public function index()
//    {
//        $result = ['status'=>200];
//
//        try{
//           $result['data'] = $this->userService->getAll();
//           $users = $result['data'];
//        } catch(Exception $e) {
//            $result = [
//                'status' => 500,
//                'error' => $e->getMessage()
//            ];
//        }
//        return view('admin::index',['users'=>json_decode($users)]);
//    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     *
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'firstname',
            'lastname',
            'address',
            'email',
            'phone',
            'image',
            'password',
        ]);
        $result = ['status'=>200];

        try{
            $result['data'] = $this->userService->saveUsertData($data);
            $users = $result['data'];
        } catch(Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return view('admin::index',['users'=>json_decode($users)]);
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
