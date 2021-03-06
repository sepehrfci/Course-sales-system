<?php

namespace Sepehrfci\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sepehrfci\Category\Http\Requests\CategoryRequest;
use Sepehrfci\Category\Models\Category;
use Sepehrfci\Category\Repository\CategoryRepository;
use Sepehrfci\Category\Responses\AjaxResponse;

class CategoryController extends Controller
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->all();
        return view('Category::index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->repository->store($request);
        return back()->with([
            'success' => 'دسته بندی مورد نظر با موفقیت ایجاد شد.'
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repository->findById($id);
        $categories = $this->repository->allExceptById($id);
        return view('Category::edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->repository->update($id,$request);
        return redirect(route('categories.index'))->with([
            'success' => 'دسته بندی مورد نظر با موفقیت بروزرسانی شد.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return AjaxResponse::success('حذف دسته بندی با موفقیت انجام شد.');
    }
}
