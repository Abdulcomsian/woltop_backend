<?php

namespace App\Services;

use App\Models\ParentCategory;

class ParentCategoryService
{
    protected $model;

    public function __construct(ParentCategory $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $save = new $this->model;
        $save->name = $data['name'];

        $save->save();

        return $save;
    }

    public function delete($data)
    {
        return $this->model->findOrFail($data['parent_category_id'])
        ->delete();
    }

    public function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update($data)
    {
        $update = $this->model::findOrFail($data['parent_category_id']);
        $update->name = $data['name'];
        $update->save();

        return $update;
    }
}
