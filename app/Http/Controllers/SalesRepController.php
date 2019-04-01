<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Repositories\SalesRepRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class SalesRepController extends Controller
{
    /**
     * @var SalesRepRepository
     */

    private $salesRepRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(SalesRepRepository $salesRepRepository, Request $request)
    {
        $this->salesRepRepo = $salesRepRepository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $info = ['title' => 'Sales Reps'];
        $rows = $this->salesRepRepo->paginateCompany($this->request);


        return view('registry.sales_reps.index', compact('info', 'rows'));
    }

    /**
     * Show the form modal for creating a new Sales Rep.
     *
     * @return Response
     * @throws Throwable
     */
    public function create()
    {
        return view('registry.sales_reps.create')->render();
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
//        $this->authorize('store', SalesRepPolicy::class);

        $this->salesRepRepo->create($request->all());

        return back()->with('success', 'Sales Rep successfully added');
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
        $data = $this->salesRepRepo->show($id);

        return view(
            'registry.sales_reps.edit', compact('data')
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
        $this->salesRepRepo->update($request, $id);

        return back()->with('success', 'Sales Rep details has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->salesRepRepo->delete($id);

        return response()->json(['status' => 'success', 'msg' => 'Sales Rep has been deleted.']);
    }
}
