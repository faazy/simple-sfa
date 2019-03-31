<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class CustomerController extends Controller
{
    /**
     * @var CategoriesRepository
     */

    private $customerRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(CustomerRepository $customerRepository, Request $request)
    {
        $this->customerRepo = $customerRepository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $info = ['title' => 'Customers'];
        $rows = $this->customerRepo->paginateCompany($this->request);

        return view('registry.customers.index', compact('info', 'rows'));
    }

    /**
     * Show the form modal for creating a new supplier.
     *
     * @return Response
     * @throws Throwable
     */
    public function create()
    {
        return view('registry.customers.create')->render();
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

        $this->customerRepo->create($request->all());

        return back()->with('success', 'Customer successfully added');
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
        $data = $this->customerRepo->show($id);

        return view(
            'registry.customers.edit', compact('data')
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
        $this->customerRepo->update($request, $id);

        return back()->with('success', 'Customer details has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->customerRepo->delete($id);

        return response()->json(['status' => 'success', 'msg' => 'Customer has been deleted.']);
    }
}
