<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Repositories\ProductRepository;
use App\Warehouse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @var ProductRepository
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
     * Show the form for creating a new prodcutc.
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
     * @param ProductRequest $request
     * @return Collection | Product
     */
    public function store(ProductRequest $request)
    {
        //Todo Implement the create Product store() method
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Todo Implement the Product Details View (Charts and PO history of Product)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Todo Implement the Subcategory JSON OBJ
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return Collection | Product
     */
    public function update(ProductRequest $request, $id)
    {
        //Todo Implement the Subcategory JSON OBJ
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Todo Implement the Subcategory JSON OBJ
    }

    public function getSubCategories()
    {
        //Todo Implement the Subcategory JSON OBJ
    }
}
