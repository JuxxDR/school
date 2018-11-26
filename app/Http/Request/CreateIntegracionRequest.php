<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\Familias;
use Illuminate\Foundation\Http\FormRequest;

class CreateIntegracionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
//        return dd(\Request::all());
        $numeroHermanos = \Request::input('numero_hermanos', 1);
        $numeroHermanos = $numeroHermanos !== 0 ?: "1";
        return array_merge(
            Familias::rules(),
            [
                'lugar_hermanos' => 'required|max:' . $numeroHermanos . '|numeric|min:1',
            ]
        );

    }

    public function messages()
    {
        return Familias::messages();
    }


}