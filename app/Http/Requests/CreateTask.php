<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    protected $errorBag = 'create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'project' => 'required|integer|exists:projects,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'任务名称不能为空',
            'name.max'=>'任务名称长度不能大于255',
            'project.required'=>'没有提交当前任务所属的项目ID',
            'project.integer'=>'所提交的项目ID无效（非整数）',
            'project.exists'=>'所提交的项目ID无效（不存在）',
        ];
    }
}
