<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    protected $errorBag = 'update';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $this->errorBag = 'update-'.$this->route('project');
        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                    'required',
                    Rule::unique('projects')->ignore($this->route('project'))->where(function ($query){
                       return  $query->where('user_id',request()->user()->id);
                    })
                ],
            'thumbnail' => 'image|dimensions:min_width=260,min_height=90|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'项目名称不能为空',
            'name.unique'=>'项目名称已存在',
            'thumbnail.dimensions'=>'请上传宽度大于260，高度大于90的图片'
        ];
    }
}
