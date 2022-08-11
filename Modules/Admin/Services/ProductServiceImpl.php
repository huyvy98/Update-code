<?php

namespace Modules\Admin\Services;

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
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->productRepository->getProduct();
    }

    /**
     * @param Request $request
     * @return Product
     */
    public function saveProductData(Request $request): Product
    {
        if ($request->has('image')) {
            $filePath = $request['image']->storeAs('uploads', request('image')->getClientOriginalName(), 'public');
        }
        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->image = $filePath;
        return $this->productRepository->save($product);
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
        $product = $this->productRepository->findById($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->image = $request->get('image');
        if (!$request->hasFile('image')) {
            return $this->productRepository->updateProduct($product);
        } else {
            $filePath = $request['image']->storeAs('images', request('image')->getClientOriginalName(), 'public');
            $product->image = $filePath;
        }

        return $this->productRepository->updateProduct($product);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->productRepository->destroy($id);
    }
}
