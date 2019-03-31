<?php


namespace App\Repositories;

use App\Company;
use App\Supplier;
use Common\Repo\BaseRepository;
use Common\Repository\Contracts\RepositoryInterface;

class SalesRepRepository extends BaseRepository implements RepositoryInterface
{

    /**
     * @var Company
     */
    private $campany;

    /**
     * SupplierRepository EntryPoint
     *
     * @param Company $campany
     */

    public function __construct(Company $campany)
    {
        $this->campany = $campany;
    }

    public function paginateCompany($params)
    {
        $perPage = $params['per_page'] ?? 15;

        return $this->campany->where('group_name','sales_rep')->paginate($perPage)
            ->setPath(url('salesRep/paginate?default=1'));
    }

    /**
     * Create new resource.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['group_name'] = 'sales_rep';
        return $this->campany->create($attributes);
    }

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->campany
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
        return $this->campany->find($id);
    }

    /**
     * Update the resources
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return $this->campany
            ->where('id', $id)
            ->update($data->only(['name', 'email', 'group_name', 'company', 'phone']));
    }


}
