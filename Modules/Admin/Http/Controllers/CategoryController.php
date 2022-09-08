<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\CategoryService;
use Modules\Admin\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    public CategoryService $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryService->getCategory();

        return view('admin::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->saveCategory($request);

        return Redirect::route('categories.index')->with('message', 'Đã tạo mới danh mục');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $categories = $this->categoryService->editCategory($id);

        return view('admin::category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $this->categoryService->updateCategory($request, $id);

        return Redirect::route('categories.index')->with('message', 'Đã cập nhật tên danh mục');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->categoryService->destroyCategory($id);

        return Redirect::route('categories.index')->with('message', 'Đã xóa danh mục');
    }
}
