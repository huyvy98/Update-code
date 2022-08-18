<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Http\Requests\ProductRequest;

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
    public function index(Request $request): View
    {
        $products = $this->productService->getAll($request);
        return view('admin::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin::product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productService->saveProductData($request);

        return Redirect::route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $products = $this->productService->editProduct($id);

        return view('admin::product.edit', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, int $id): RedirectResponse
    {
        $this->productService->updateProduct($request, $id);

        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->productService->destroy($id);

        return Redirect::route('products.index');
    }
}
