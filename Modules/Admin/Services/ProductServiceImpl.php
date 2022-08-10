<?php
namespace Modules\Admin\Services;

use Illuminate\Http\Request;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Repositories\Mysql\ProductRepoImpl;
use Modules\Admin\Repositories\Parameters\ProductParam;

class ProductServiceImpl implements ProductService
{
    /**
     * @var ProductRepoImpl $productRepoimpl
     */
    protected ProductRepoImpl $productRepoImpl;

    /**
     * ProductService constructor
     * @param ProductRepoImpl $productRepoImpl
     */
    public function __construct(ProductRepoImpl $productRepoImpl)
    {
        $this->productRepoImpl = $productRepoImpl;
    }
    public function getAll(): string
    {
        return $this->productRepoImpl->getProduct();
    }
    public function saveProductData(Request $request): string
    {
        $data = new ProductParam($request->input('name'),$request->input('price'),$request->input('description'),$request->input('image'));
        return $this->productRepoImpl->createProduct((array)$data);
    }

    public function updateProduct(array $data, $id): string
    {
        return $this->productRepoImpl->updateProduct($data,$id);
    }
    public function deleteProductData($id): string
    {
        return $this->productRepoImpl->deleteProduct($id);
    }
}
