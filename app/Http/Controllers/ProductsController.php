<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductRepository;
use App\Warehouse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @var CategoriesRepository
     */

    private $productRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(ProductRepository $productRepository, Request $request)
    {
        $this->productRepo = $productRepository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = ['title' => 'Products'];
        $rows = $this->productRepo->paginateProducts($this->request);

        return view('producs.index', compact('info', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = ['title' => 'Products'];
        $categories = Category::main()->get();
        $warehouses = Warehouse::all();


        return view('producs.create', compact('info', 'categories', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSubCategories()
    {
        //Todo Implement the Subcategory JSON OBJ
    }
}
