<?php


namespace App\Repositories;


use App\Category;
use Common\Repo\BaseRepository;
use Common\Repository\Contracts\RepositoryInterface;

class CategoriesRepository extends BaseRepository implements RepositoryInterface
{

    /**
     * @var Category
     */
    private $category;

    /**
     * CategoriesRepository EntryPoint
     *
     * @param Category $category
     */

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function paginateCategories($params)
    {
        $perPage = $params['per_page'] ?? 15;

        return $this->category->paginate($perPage)
            ->setPath(url('categories/paginate?default=1'));
    }

    /**
     * Create new resource.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->category->create($attributes);
    }

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->category
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
        return $this->category->find($id);
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
        return $this->category
            ->where('id', $id)
            ->update($data->only(['code', 'name', 'parent_id']));
    }

    public function parentCategories()
    {
        return $this->category
            ->select(['id', 'code', 'name'])
            ->whereNull('parent_id')
            ->get();

    }
}