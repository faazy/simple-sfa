<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class SupplierController extends Controller
{
    /**
     * @var SupplierRepository
     */

    private $supplierRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(SupplierRepository $supplierRepository, Request $request)
    {
        $this->supplierRepo = $supplierRepository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $info = ['title' => 'Suppliers'];
        $rows = $this->supplierRepo->paginateCompany($this->request);


        return view('registry.suppliers.index', compact('info', 'rows'));
    }

    /**
     * Show the form modal for creating a new supplier.
     *
     * @return Response
     * @throws Throwable
     */
    public function create()
    {
        return view('registry.suppliers.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CompanyRequest $request)
    {
//        $this->authorize('store', CategoryPolicy::class);

        $this->supplierRepo->create($request->all());

        return back()->with('success', 'Supplier successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws Throwable
     */
    public function edit($id)
    {
        $data = $this->supplierRepo->show($id);

        return view(
            'registry.suppliers.edit', compact('data')
        )->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $this->supplierRepo->update($request, $id);

        return back()->with('success', 'Supplier details has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Supplier Suggetion Autocomplete
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestions()
    {
        return response()->json([
            'results' => $this->supplierRepo->getSupplierSuggestions($this->request->get('term'))
        ], 200);
    }
}
