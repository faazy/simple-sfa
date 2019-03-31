<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Repositories\WarehouseRepository;
use Common\Core\Controller;
use Common\Policies\WarehousePolicy;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    /**
     * @var WarehouseRepository
     */

    private $warehouseRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(WarehouseRepository $repository, Request $request)
    {
        $this->warehouseRepo = $repository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('show', WarehousePolicy::class);

        $info = ['title' => 'Warehouses'];
        $rows = $this->warehouseRepo->paginateWarehouses($this->request);

        return view('settings.warehouses.index', compact('info', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function create()
    {
        return view('settings.warehouses.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WarehouseRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(WarehouseRequest $request)
    {
//        $this->authorize('store', WarehousePolicy::class);

        $this->warehouseRepo->create($this->request->all());

        return back()->with('success', 'Warehouse created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function edit($id)
    {
        $data = $this->warehouseRepo->show($id);

        return view(
            'settings.warehouses.edit', compact('data')
        )->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WarehouseRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(WarehouseRequest $request, $id)
    {
//        $this->authorize('update', WarehousePolicy::class);
        $this->warehouseRepo->update($request, $id);

        return back()->with('success', 'Warehouse details has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->warehouseRepo->delete($id);

        return response()->json(['status' => 'success', 'msg' => 'Warehouse has been deleted.']);
    }

    public function paginateWarehouse()
    {


    }
}
