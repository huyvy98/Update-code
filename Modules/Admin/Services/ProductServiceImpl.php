<?php

namespace Modules\Admin\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Http\Requests\ProductRequestImage;

class ProductServiceImpl implements ProductService
{
    /**
     * @var ProductRepository $productRepository
     */
    protected ProductRepository $productRepository;

    /**
     * ProductService constructor
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * get all product
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getProduct(Request $request): LengthAwarePaginator
    {
        return $this->productRepository->get(
            $request->input('searchName'),
            $request->input('minPrice'),
            $request->input('maxPrice')
        );
    }

    /**
     * save product to database
     *
     * @param ProductRequest $request
     * @return Product
     */
    public function saveProduct(ProductRequest $request): Product
    {
        $category = $request->get('category_ids');
        if ($request->has('image')) {
            $filePath = $request['image']->storeAs('uploads', request('image')->getClientOriginalName(), 'public');
        }
        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->image = $filePath;
        $data = $this->productRepository->save($product);

        $data->category()->attach($category);

        return $data;
    }

    /**
     * edit product
     *
     * @param int $id
     * @return Product|null
     */
    public function editProduct(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    /**
     * update product
     *
     * @param ProductRequestImage $request
     * @param $id
     * @return Product
     */
    public function updateProduct(ProductRequestImage $request, $id): Product
    {
        $category = $request->get('category_ids');
        $product = $this->productRepository->findById($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');

        if ($request->hasFile('image')) {
            $filePath = $request['image']->storeAs('uploads', request('image')->getClientOriginalName(), 'public');
            $product->image = $filePath;
        }
        $data = $this->productRepository->update($product);

        $data->category()->sync($category);

        return $data;
    }

    /**
     * delete product
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->productRepository->destroy($id);
    }

    /**
     * Get category
     *
     * @return Collection
     */
    public function getCategory(): Collection
    {
        return $this->productRepository->getCategory();
    }
}
