<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\Familias;
use App\model\Padre;
use Illuminate\Foundation\Http\FormRequest;

class CreatePadresRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            Padre::rules('padres.0.'),
            [
                'padres.1.' . 'nombre_completo' => 'required_without:padres.0.nombre_completo|max:255',
                'padres.1.' . 'curp' => 'required_without:padres.0.curp|max:18',
                'padres.1.' . 'edo_civil' => 'required_without:padres.0.edo_civil|max:255',
                'padres.1.' . 'ocupacion' => 'required_without:padres.0.ocupacion|max:255',
                'padres.1.' . 'tel_fijo' => 'required_without:padres.0.tel_fijo',
                'padres.1.' . 'celular' => 'required_without:padres.0.celular',
                'padres.1.' . 'email' => 'required_without:padres.0.email|email|nullable',

                'padres.1.' . 'calle' => 'required_without:padres.0.calle',
                'padres.1.' . 'no_ext' => 'required_without:padres.0.no_ext|nullable',
                'padres.1.' . 'colonia' => 'required_without:padres.0.colonia',
                'padres.1.' . 'entre_calle1' => 'required_without:padres.0.entre_calle1',
                'padres.1.' . 'entre_calle2' => 'required_without:padres.0.entre_calle2',
                'padres.1.' . 'cp' => 'required_without:padres.0.cp',

            ]
        );
    }

    public function messages()
    {
        return array_merge(
            Padre::messages('padres.0.'),
            ['padres.1.*.required_without' => 'Ingrese los datos de al menos un padre.']
        );
    }


}