<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class CategoryController extends Controller
{

    /**
     * @var CategoriesRepository
     */

    private $categoryRepo;

    /**
     * @var Request
     */
    private $request;


    public function __construct(CategoriesRepository $categoriesRepository, Request $request)
    {
        $this->categoryRepo = $categoriesRepository;
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $info = ['title' => 'Categories'];
        $rows = $this->categoryRepo->paginateCategories($this->request);


        return view('settings.categories.index', compact('info', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws Throwable
     */
    public function create()
    {
        $categories = $this->categoryRepo->parentCategories();

        return view(
            'settings.categories.create', compact('categories'))
            ->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        //        $this->authorize('store', CategoryPolicy::class);

        $this->categoryRepo->create($request->all());

        return back()->with('success', 'Category successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws Throwable
     */
    public function show($id)
    {

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
        $data = $this->categoryRepo->show($id);
        $categories = $this->categoryRepo->parentCategories();

        return view(
            'settings.categories.edit', compact('categories', 'data')
        )->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepo->update($request, $id);

        return back()->with('success', 'Category details has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);

        return response()->json(['status' => 'success', 'msg' => 'Category has been deleted.']);
    }
}
