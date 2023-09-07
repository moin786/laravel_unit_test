<?php
namespace Peal\CorePackages\Suppliers\Contracts;

use Illuminate\Http\JsonResponse;
use Peal\CorePackages\Suppliers\Models\Supplier;
use Peal\CorePackages\Suppliers\Resources\SupplierResource;

interface SupplierContract
{
    /**
     * Add Supplier data
     *
     * @param array $data
     * @return mixed
     */
    public function add($data);

    /**
     * Get supplier list
     *
     * @return mixed
     */
    public function get_suppliers();

    /**
     * update supplier record
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * Delete supplier record
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Get supplier record
     *
     * @param int $id
     * @return mixed
     */
    public function getSupplierById($id);
}