<?php


namespace App\Repositories;

use App\Company;
use App\Supplier;
use Common\Repo\BaseRepository;
use Common\Repository\Contracts\RepositoryInterface;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SupplierRepository extends BaseRepository implements RepositoryInterface
{

    /**
     * @var Company
     */
    private $company;

    /**
     * SupplierRepository EntryPoint
     *
     * @param Company $company
     */

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function paginateCompany($params)
    {
        $perPage = $params['per_page'] ?? 15;

        return $this->company->paginate($perPage)
            ->setPath(url('suppliers/paginate?default=1'));
    }

    /**
     * Create new resource.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['group_name'] = 'supplier';
        return $this->company->create($attributes);
    }

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->company
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
        return $this->company->find($id);
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
        return $this->company
            ->where('id', $id)
            ->update($data->only(['name', 'email', 'group_name', 'company', 'phone']));
    }

    /**
     * Feth All occurence by term delimitter
     *
     * @param $term
     * @param int $limit
     * @return Collection |Model
     */
    public function getSupplierSuggestions($term, $limit = 10)
    {

        return $this->company->select(['id', DB::Raw("(CASE WHEN company = '-' THEN name ELSE CONCAT(company, ' (', name, ')') END) as text")])
            ->where(['group_name' => 'supplier'])
            ->where(function ($query) use ($term) {
                $query->where('name', 'like', '%' . $term . '%')
                    ->orWhere('company', 'like', '%' . $term . '%')
                    ->orWhere('email', 'like', '%' . $term . '%');
            })->limit($limit)
            ->get();

    }


}