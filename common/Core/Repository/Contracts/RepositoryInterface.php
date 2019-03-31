<?php


namespace Common\Repository\Contracts;


interface RepositoryInterface
{
//    /**
//     * RepositoryInterface constructor.
//     * @param Model $model
//     */
//    public function __construct(Model $model);

    /**
     * Create new resource.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Get the specified records.
     *
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * Update the resources
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * Delete the resource
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);


}