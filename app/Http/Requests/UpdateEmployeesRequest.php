<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'image'=>'required',
            //'date'=>'required',
            //'brithday'=>'required',
            //'prefix'=>'required',
            //'name'=>'required',
            //'nickname'=>'required',
            //'address'=>'required',
            //'cardaddress'=>'required',
            //'tel'=>'required',
            //'idcard'=>'required',
            //'pobirth'=>'required',
            //'age'=>'required',
           //'nationlity'=>'required',
            //'race'=>'required',
            //'religion'=>'required',
            //'psts'=>'required',
            //'onchilden'=>'required',
            //'stum'=>'required',
            //'typemilitary'=>'required',
            //'datemilitary'=>'required',
            //'divingcard'=>'required',
            //'cartype'=>'required',
            //'caryearstart'=>'required',
            //'caryearend'=>'required',
            //'datejop'=>'required',
            //'position'=>'required',
            //'needsalary'=>'required',
            //'case'=>'required',
            //'towork'=>'required',
            //'vaccine1'=>'required',
            //'vaccine2'=>'required',
            //'disease'=>'required',
            //'addicted'=>'required',
            //'typeeducation'=>'required',
            //'yearstart'=>'required',
           //'yearend'=>'required',
           //'location'=>'required',
           //'degree'=>'required',
           //'gpa'=>'required',
           //'major'=>'required'
           //'acquaintance'=>'required',
          //'addressacquaintance'=>'required',
           //'telacquaintance'=>'required',
           //'relation'=>'required',
        ];
    }
}
