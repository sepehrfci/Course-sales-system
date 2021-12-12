<?php

namespace Sepehrfci\Category\Repository;

use Sepehrfci\Category\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }
    public function allExceptById($id)
    {
        return Category::all()->filter(function ($item) use($id){
            return $item->id != $id;
        });
    }
    public function findById($id)
    {
        return Category::query()->findOrFail($id);
    }
    public function store($request)
    {
        Category::query()->create($request->all());
    }
    public function update($id,$request)
    {
        Category::query()->findOrFail($id)->update($request->all());
    }
    public function delete($id)
    {
        Category::query()->findOrFail($id)->delete();
    }
}
