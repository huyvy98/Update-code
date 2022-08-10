<?php
namespace Modules\Admin\Contracts\Services;

use Illuminate\Http\Request;

interface ProductService
{
    /**
     * @return String
     */
    public function getAll(): String;

    /**
     * @param Request $request
     * @return String
     */
    public function saveProductData(Request $request): string;

    /**
     * @param $id
     * @param array $data
     * @return String
     */
    public function updateProduct(array $data,$id): string;

    /**
     * @param $id
     * @return String
     */
    public function deleteProductData($id): string;
}
