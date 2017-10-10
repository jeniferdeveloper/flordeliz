<?php

namespace FlorDeLiz\Http\Requests;

use FlorDeLiz\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use FlorDeLiz\Models\Cupom;

class AdminCupomRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //  return Auth::check();
         return true;

        //  $id = $this->get('id');
        //  echo 'ID: '.$id;
        //  exit ;
        // $usertype = User::find($id);
        // if ($usertype) {
        //     return true;
        // }
        // return false;
    //     $clinicId = \Route::input('id'); //or $this->route('id');

    // return User::where('id', $clinicId)
    // ->where('user_id', Auth::id())
    // ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description'=>'required|min:3',
            'code'=>'required|min:6',     
            'value'=>'required'    
           
        ];
    }
}
