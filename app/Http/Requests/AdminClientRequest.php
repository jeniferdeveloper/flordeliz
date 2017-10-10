<?php

namespace FlorDeLiz\Http\Requests;

use FlorDeLiz\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use FlorDeLiz\Models\Cliente;
use FlorDeLiz\Models\User;

class AdminClientRequest extends Request
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
             'user.name'=>'required|min:3',
             'user.email'=>'required|min:3',
//             'user.user_id'=>'required',
//             'user.password'=>'required',
//             'phone',
//             'address',
//             'city',
//             'state',
//             'zipcode'
        ];
    }
}
