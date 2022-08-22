<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Http\Requests\ProductRequestImage;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    public ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $products = $this->productService->getAll($request);
        session()->flashInput($request->input());

        return view('admin::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $category = $this->productService->getCategory();

        return view('admin::product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productService->saveProductData($request);

        return Redirect::route('products.index')->with('message', 'Đã thêm mới sản phẩm');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $products = $this->productService->editProduct($id);
        $category = $this->productService->getCategory();

        return view('admin::product.edit', compact('products', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequestImage $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductRequestImage $request, int $id): RedirectResponse
    {
        $this->productService->updateProduct($request, $id);

        return Redirect::route('products.index')->with('message', 'Đã cập nhật sản phẩm ');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->productService->destroy($id);

        return Redirect::route('products.index')->with('message', 'Đã xóa sản phẩm ');
    }
}
