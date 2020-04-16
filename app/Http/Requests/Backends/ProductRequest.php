<?php

namespace App\Http\Requests\Backends;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'product_code' => 'nullable|string',
                    'name' => 'nullable|string',
                ];
                break;

            case 'store':
                return [
                    'name' => 'required|string|max:255',
                    'product_code' => 'required|string|max:255',
                    'slug' => 'required|string|unique:products',
                    'product_description' => 'required|string',
                    'product_category_id' => 'required|integer',
                    'product_info' => 'nullable|string',
                    'description' => 'nullable|string',
                    'keywords' => 'nullable|string',
                    'image' => 'required|image|file',
                    'price' => 'required|integer',
                    'unit_id' => 'required|integer'
                ];
                break;
            case 'update':
                return [
                    'name' => 'required|string|max:255',
                    'product_code' => 'required|string|max:255',
                    'slug' => 'required|string|unique:products,id,'.$this->route('id'),
                    'product_description' => 'required|string',
                    'product_category_id' => 'required|integer',
                    'product_info' => 'nullable|string',
                    'description' => 'nullable|string',
                    'keywords' => 'nullable|string',
                    'image' => 'required|image|file',
                    'price' => 'required|integer',
                    'unit_id' => 'required|integer'
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
