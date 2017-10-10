<?php

namespace FlorDeLiz\Http\Controllers;

use FlorDeLiz\Http\Requests\CheckoutRequest;


use FlorDeLiz\Repositories\ClientRepository;
use FlorDeLiz\Repositories\PedidoItemsRepository;
use FlorDeLiz\Repositories\PedidoRepository;
use FlorDeLiz\Repositories\ProductRepository;

use FlorDeLiz\Repositories\UserRepository;
use FlorDeLiz\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var PedidoItemsRepository
     */
    private $pedidoItemsRepository;

    public function __construct(
        UserRepository $userRepository,
        PedidoRepository $orderRepository,
        ProductRepository $productRepository,

        PedidoItemsRepository $pedidoItemsRepository,
        OrderService $service,
        ClientRepository $clientRepository) {


        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
        $this->clientRepository = $clientRepository;

        $this->pedidoItemsRepository = $pedidoItemsRepository;
    }

    public function  index(){
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
//        dd($clientId);
        $orders = $this->orderRepository->scopeQuery(function ($query) use($clientId){
           return $query->where('client_id', '=', $clientId);
        })->paginate(5);

//        $price = currency_format(12.00, 'EUR');

        return view('customer.order.index',compact( 'orders'));

    }

    public function create(){


            $products = $this->productRepository->lists();
            $clientes = $this->clientRepository->with('user')->all();

//dd($clientes);

        return view('customer.order.create',compact( 'products', 'clientes'));
    }

      public function store(CheckoutRequest $request){

        $data = $request->all();

//        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
//        $data['cliente_id'] = 1;

////          Pedido::create($request->all());
////          dd($data);
//          $item =[
//                'produto_id' => 1,
//                'pedido_id' => 5,
//              'qtd' => 1,
//              'preco' => 11,
//          ];
////          dd($item);
//          $items = $this->pedidoItemsRepository->create($item);
//          dd($data);

        $this->service->create($data);

        return redirect()->route('admin.orders.index');
    }
     
}
