<?php

namespace App\Http\Requests\Backends;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'email' => 'nullable|email'
                ];
                break;

            case 'store':
                    return [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|min:|confirmed'
                    ];
                break;
            default:
                return [
                ];
        }
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub

    }
}
