<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\Folios;
use Illuminate\Foundation\Http\FormRequest;

class CheckFolioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Folios::rules();
    }

    public function messages()
    {
        return Folios::messages();
    }


}