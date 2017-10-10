<?php

namespace FlorDeLiz\Http\Requests;

use Illuminate\Support\Facades\Auth;
use FlorDeLiz\Models\Cliente;
use FlorDeLiz\Models\User;
use function is_array;
use Illuminate\Http\Request as HttpRequest;

class CheckoutRequest extends Request
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
    public function rules(HttpRequest $request)
    {
        $rules = [
            'cupom_code' => 'exists:cupoms,code,used,0',

        ];
        $items = $request->get('items', []);
        $this->buildRulesItems(0, $items,$rules);

        $items = !is_array($items) ? [] : $items;
        foreach ($items as $key => $val){
            $this->buildRulesItems($key,$items, $rules);
        }
        return $rules;

    }

    public function buildRulesItems($key,$items, array &$rules)
    {
        if(isset($items[$key]['produto_id'])){
            $rules["items.$key.produto_id"] = 'required';
        };
        if(isset($items[$key]['qtd'])) {
            $rules["items.$key.qtd"] = 'required';
        }
    }
}
