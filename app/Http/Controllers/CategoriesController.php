<?php

namespace FlorDeLiz\Http\Controllers;

use FlorDeLiz\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use FlorDeLiz\Http\Requests;
use FlorDeLiz\Http\Controllers\Controller;
use FlorDeLiz\Http\Requests\AdminCategoryRequest;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
class CategoriesController extends Controller
{
    //
    private $_repository;

    public function __construct(CategoryRepository $repository) {
        $this->_repository=$repository;
    }
    public function Index() {
    
  
      $user = "Visitante";
      $categories = $this->_repository->with('products')->paginate(5);
//      dd($categories);
      return view('admin.categories.index', compact('categories', 'user'));

    }

    public function create() {            
        return view('admin.categories.create');      
    }

      public function store(AdminCategoryRequest $request) {
                                
                $data = $request->all();
                $this->_repository->create($data);
                return redirect()->route('admin.categories.index');

     
    }

       public function edit($id){        
               $category = $this->_repository->find($id);
           
         $categories = $this->_repository->lists();   
           
             return view('admin.categories.edit', compact('category','categories'));      
        }
         public function update(AdminCategoryRequest $request,$id){       

            $data = $request->all();
            $this->_repository->update($data,$id);
              return redirect()->route('admin.categories.index');
        }

  
}
