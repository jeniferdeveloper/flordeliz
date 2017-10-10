<?php

namespace FlorDeLiz\Http\Controllers;
use FlorDeLiz\Repositories\ProductRepository;
use FlorDeLiz\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use FlorDeLiz\Http\Requests;
use FlorDeLiz\Http\Controllers\Controller;
use FlorDeLiz\Http\Requests\AdminProductRequest;
class ProductsController extends Controller
{
    //
    private $_productRepository;
    private $_categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $this->_productRepository=$productRepository;
        $this->_categoryRepository  = $categoryRepository;
    }
    public function Index() {
    
    //   $value = config('app.locale');

    //      echo var_dump($value);
       
    //     exit;

      $user = "Visitante";
      $products = $this->_productRepository->with('category')->paginate(5);
//     dd($products);
      return view('admin.products.index', compact('products', 'user'));

    }

    public function create() {            
         $categories = $this->_categoryRepository->lists();
        return view('admin.products.create', compact('categories'));      
    }

      public function store(AdminProductRequest $request) {


        $data = $request->all();
        $this->_productRepository->create($data);
        return redirect()->route('admin.products.index');
    //     $messages = [
    //         'required' => 'O :attribute é obrigatório.',
    //         'same'    => 'The :attribute and :other must match.',
    //         'size'    => 'The :attribute must be exactly :size.',
    //         'between' => 'The :attribute must be between :min - :max.',
    //         'min' => 'Mínimo permitido para o campo :attribute ',
    //         'in'      => 'The :attribute must be one of the following types: :values',
    //     ];

    //      $rules = [

    //     'b_name'        => 'required',
    //     'base_size'  => 'required|integer',
    //     'start_date'  => 'required|date',
    //    'end_date'    => 'required|date|after:start_date' // end date must be greater than start_date

    // ];

    // $messages = [

    //     'b_name.required' => 'please fill Broadcast Name field',
    //     'base_size.required' => 'please fill Base Size field',
    //     'base_size.integer' => 'Please insert integer',
    //     'date.required' => 'please fill Broadcast Date',
    //     'start_date.date' => 'Please insert valid start_date format',
    //     'end_date.date' => 'Please insert valid end_date format',

    // ];
// $rules = [
//     'first_name'            => 'required|alpha|min:2',
//     'last_name'             => 'required|alpha|min:2',
//     'email'                 => 'required|email|unique:users,email,' . Input::get('id') . ',id',
//     'password'              => 'alpha_num|between:6,12|confirmed',
//     'password_confirmation' => 'alpha_num|between:6,12',
//     'address'               => 'regex:/^[a-z0-9- ]+$/i|min:2',
//     'city'                  => 'alpha|min:2',
//     'state'                 => 'alpha|min:2|max:2',
//     'zip'                   => 'numeric|min:5|max:5',
//     'phone'                 => 'regex:/^\d{3}\-\d{3}\-\d{4}$/',
// ];
// $messages = [
//     'unique'        => 'The :attribute already been registered.',
//     'phone.regex'   => 'The :attribute number is invalid , accepted format: xxx-xxx-xxxx',
//     'address.regex' => 'The :attribute format is invalid.',
// ];
    // $messsages = array(
    //     'email.required'=>'You cant leave Email field empty',
    //     'name.required'=>'You cant leave name field empty',
    //             'name.min'=>'The field has to be :min chars long',
    // );

    // $rules = array(
    //     'email'=>'required|unique:content',
    //     'name'=>'required|min:3',
    // );

    // $validator = Validator::make(Input::all(), $rules,$messsages);

    // $validation = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages );
    // $validation->setAttributeNames(['b_name' => 'broadcast']);

    //    if ($validation->passes()) {

    //    }

    //     $validator = Validator::make($request->all(),$messages);

    //     if ($validator->fails()) {
    //     return redirect()->route('admin.products.create')
    //                 ->withErrors($validator)
    //                 ->withInput();
    //     }

    }

       public function edit($id){        
               $product = $this->_productRepository->find($id);
          
             $categories = $this->_categoryRepository->lists();
            // echo var_dump($categories);
            // exit;
             return view('admin.products.edit', compact('product', 'categories'));      
        }

         public function update(AdminProductRequest $request,$id){       

            //  dd($request->all(),$id); 
            $data = $request->all();
            $this->_productRepository->update($data,$id);
              return redirect()->route('admin.products.index');
        }

       public function destroy($id){       

            //  dd($request->all(),$id); 
            
            $this->_productRepository->delete($id);
              return redirect()->route('admin.products.index');
        }

  
}
