<?php

namespace App\Http\Requests\Backends;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
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
        $actionName = $this->route()->getActionMethod();
        switch ($actionName){
            case 'index':
                return [
                    'id' => 'nullable|regex:'.config('pattern.id'),
                    'name' => 'nullable|string',
                    'category_id' => 'nullable|integer'
                ];
                break;

            case 'store':
                return [
                    'title' => 'required|string|max:255',
                    'slug' => 'required|string|unique:categories',
                    'content' => 'required|string',
                    'category_id' => 'required|integer',
                    'short_content' => 'nullable|string',
                    'description' => 'nullable|string',
                    'keywords' => 'nullable|string',
                    'image' => 'required|image|file'
                ];
                break;
            case 'update':
                return [
                    'title' => 'required|string|max:255',
                    'slug' => 'required|string|unique:categories,id,'.$this->route('id'),
                    'content' => 'required|string',
                    'category_id' => 'required|integer',
                    'short_content' => 'nullable|string',
                    'description' => 'nullable|string',
                    'keywords' => 'nullable|string',
                    'image' => 'nullable|image|file'
                ];
                break;
            case 'destroy':
                return [
                    'id' => 'required|integer'
                ];
                break;
            default:
                return [
                ];
        }
    }
}
