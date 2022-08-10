<?php
namespace Modules\Admin\Repositories\Mysql;


use App\Models\Product;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    protected Product $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Save Product to database
     *
     * @param $product
     * @return Product
     */
    public function save($product): Product
    {
        $product->save();
        return $product;
    }


    public function getProduct()
    {
         return $this->product->get();
    }

    /**
     * Create product
     *
     * @param array $attributes
     * @return Product
     */
    public function createProduct(array $attributes): Product
    {
        return Product::create($attributes);
    }

    /**
     * Update product
     * @param $id
     * @param array $attributes
     * @return Product
     */
    public function updateProduct($id, array $attributes): Product
    {
        return Product::where('id',$id)->update($attributes);
    }

    /**
     * Delete product
     * @param $id
     * @return Product
     */
    public function deleteProduct($id): Product
    {
        return Product::where('id',$id)->delete();
    }
}
