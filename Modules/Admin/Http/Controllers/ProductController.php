<?php

namespace Modules\Admin\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Services\ProductServiceImpl;

class ProductController extends Controller
{

    protected ProductServiceImpl $productServiceImpl;

    public function __construct(ProductServiceImpl $productServiceImpl)
    {
        $this->productServiceImpl = $productServiceImpl;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $result = ['status'=>200];

        try{
            $result['data'] = $this->productServiceImpl->getAll();
            $products = $result['data'];
        } catch(Exception $e){
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }
        return view('admin::index',['products'=>json_decode($products)]);
    }

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
     * @param ProductRequest $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        try{
           $result['data'] = $this->productServiceImpl->saveProductData($request);
           $products = $result['data'];
        }catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return back()->with('success', 'User created successfully.');
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
