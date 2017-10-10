<?php

namespace FlorDeLiz\Http\Controllers;
use FlorDeLiz\config\App;
use FlorDeLiz\Repositories\ClientRepository;
use FlorDeLiz\Services\ClientService;
use Illuminate\Http\Request;
use FlorDeLiz\Http\Requests;
use FlorDeLiz\Http\Controllers\Controller;
use FlorDeLiz\Http\Requests\AdminClientRequest;
class ClientsController extends Controller
{
    //
    private $_clientRepository;
    private $_categoryRepository;
    private $_clientService;

    public function __construct(ClientRepository $clientRepository,ClientService $clientService) {
        $this->_clientRepository=$clientRepository;
        $this->_clientService = $clientService;
        
        
    }
    public function Index() {
    
    //   $value = config('app.locale');

    //      echo var_dump($value);
       
    //     exit;

      $user = "Visitante";
      $clients = $this->_clientRepository->paginate(5);

      return view('admin.clients.index', compact('clients', 'user'));

    }

    public function create() {            
         
        return view('admin.clients.create');      
    }

      public function store(AdminClientRequest $request) {


        $data = $request->all();
//        dd($data);
        $this->_clientService->store($data);
        return redirect()->route('admin.clients.index');
       }

       public function edit($id){        
               $client = $this->_clientRepository->find($id);              
                    
             return view('admin.clients.edit', compact('client'));      
        }

         public function update(AdminClientRequest $request,$id){       


            $data = $request->all();
//             dd($data,$id);

            $this->_clientService->update($data,$id);
              return redirect()->route('admin.clients.index');
        }

       public function destroy($id){       

            //  dd($request->all(),$id); 
            
            $this->_clientRepository->delete($id);
              return redirect()->route('admin.clients.index');
        }

  
}
