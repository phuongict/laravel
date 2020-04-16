<?php

namespace App\Http\Requests\Backends;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                ];
                break;

            case 'store':
                return [
                    'name' => 'required|string|max:255',
                    'link' => 'required|string',
                    'description' => 'nullable|string',
                    'image' => 'required|image|file'
                ];
                break;
            case 'update':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string',
                    'description' => 'nullable|string',
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
