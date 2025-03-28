<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqService
{
    protected $model;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function getFaq(){
        $faq = $this->model->get();
        return $faq;
    }

    public function store($data){
        if(isset($data['faqs']) && count($data['faqs']) > 0){
            foreach($data['faqs'] as $faq){
                $save = new $this->model;
                $save->user_id = Auth::user()->id;
                $save->question = $faq['question'];
                $save->answer = $faq['answer'];
                $save->save();
            }
        }
        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->user_id = Auth::user()->id;
        $update->question = $data['question'];
        $update->answer = $data['answer'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
