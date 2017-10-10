<?php

namespace FlorDeLiz\Http\Controllers\Api\Client;

use FlorDeLiz\Http\Controllers\Controller;
use FlorDeLiz\Http\Requests\AdminClientRequest;
use FlorDeLiz\Http\Requests\CheckoutRequest;
use FlorDeLiz\Repositories\OrderRepository;
use FlorDeLiz\Repositories\ProductRepository;
use FlorDeLiz\Repositories\UserRepository;
use FlorDeLiz\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
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

    private $with = ['items','client','cupom'];
    public function __construct(
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        OrderService $service)
    {


        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index()
    {
        $userLoggedId = Authorizer::getResourceOwnerId();
        $client = $this->userRepository->find($userLoggedId)->client;
        $clientId = $client->id;
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->scopeQuery(function ($query) use ($clientId) {
                return $query->where('client_id', '=', $clientId);
            })->paginate(5);

//        $price = currency_format(12.00, 'EUR');

        return $orders;

    }

    public function create()
    {

        $products = $this->productRepository->lists();

        return view('customer.order.create', compact('products'));
    }

    public function store(CheckoutRequest $request)
    {

        $data = $request->all();

        $items = $request->get('items', []);

//        dd($items[0]['product_id']);
        $userLoggedId = Authorizer::getResourceOwnerId();
        $client = $this->userRepository->find($userLoggedId)->client;
        $data['client_id'] = $client->id;

        $o = $this->service->create($data);

        return $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->find($o->id);
    }

    public function show($id)
    {
        $userLoggedId = Authorizer::getResourceOwnerId();
        $client = $this->userRepository->find($userLoggedId)->client;
//        dd($client);
        $clientId = $client->id;
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->scopeQuery(function ($query) use($clientId,$id){
            return $query->where('id', '=', $id)->where('client_id', '=', $clientId);
        })->paginate(5);


        return $orders;
    }

}
