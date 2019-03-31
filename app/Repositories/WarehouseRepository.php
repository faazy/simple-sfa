<?php


namespace App\Repositories;

use App\Warehouse;
use Common\Repo\BaseRepository;
use Common\Repository\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class WarehouseRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * @var Warehouse
     */
    private $warehouse;


    public function __construct(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;

    }


    /**
     * Paginate all users using given params.
     *
     * @param $params
     * @return LengthAwarePaginator
     */
    public function paginateWarehouses($params)
    {
        $perPage = $params['per_page'] ?? 15;

        return $this->warehouse->paginate($perPage)
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
        return $this->warehouse->create($attributes);
    }

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->warehouse
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
        return $this->warehouse->find($id);
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
        return $this->warehouse
            ->where('id', $id)
            ->update($input->only(['code', 'name', 'address', 'phone']));
    }

    public function handleBulkActions()
    {
        // TODO: Implement bulkActions() method.
    }
}