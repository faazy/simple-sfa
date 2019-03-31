<?php


namespace App\Repositories;

use App\Product;
use Common\Repo\BaseRepository;
use Common\Repository\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * @var Product
     */
    private $product;


    public function __construct(Product $product)
    {
        $this->product = $product;

    }


    /**
     * Paginate all users using given params.
     *
     * @param $params
     * @return LengthAwarePaginator
     */
    public function paginateProducts($params)
    {
        $perPage = $params['per_page'] ?? 15;

        return $this->product->paginate($perPage)
            ->setPath(url('warehouse/paginate?default=1&'));
    }

    /**
     * Create new resource.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->product->create($attributes);
    }

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->product
            ->where('id', $id)
            ->delete();
    }

    /**
     * Get the specified records.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->product->find($id);
    }

    /**
     * Update the resources
     *
     * @param $input
     * @param $id
     * @return mixed
     */
    public function update($input, $id)
    {
        return $this->product
            ->where('id', $id)
            ->update($input->only(['code', 'name', 'address', 'phone']));
    }

    public function handleBulkActions()
    {
        // TODO: Implement bulkActions() method.
    }
}