<?php

namespace Modules\Admin\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use Modules\Admin\Contracts\Services\ProductService;

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
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->productRepository->getProduct(
            $request->input('searchName'),
            $request->input('minPrice'),
            $request->input('maxPrice')
        );
    }

    /**
     * @param Request $request
     * @return Product
     */
    public function saveProductData(Request $request): Product
    {
        $category = $request->input('category');
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
     * @param int $id
     * @return Product|null
     */
    public function editProduct(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Product
     */
    public function updateProduct(Request $request, $id): Product
    {
        $category = $request->get('category');
        $product = $this->productRepository->findById($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');

        if ($request->hasFile('image')) {
            $filePath = $request['image']->storeAs('images', request('image')->getClientOriginalName(), 'public');
            $product->image = $filePath;
        }
        $data = $this->productRepository->updateProduct($product);

        $data->category()->toggle($category);

        return $data;
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->productRepository->destroy($id);
    }

    public function getCategory()
    {
        return $this->productRepository->getCategory();
    }
}
