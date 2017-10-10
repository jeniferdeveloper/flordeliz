<?php

namespace FlorDeLiz\Services;

use FlorDeLiz\Repositories\ClientRepository;
use FlorDeLiz\Repositories\CupomRepository;
use FlorDeLiz\Repositories\PedidoItemsRepository;
use FlorDeLiz\Repositories\PedidoRepository;
use FlorDeLiz\Repositories\ProductRepository;
use FlorDeLiz\Repositories\UserRepository;


class OrderService
{

    /**
     * @var ClientRepository
     */
    private $clientRespository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var CupomRepository
     */
    private $cupomRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var PedidoItemsRepository
     */
    private $pedidosItemsRepository;


    public function __construct(PedidoRepository $orderRepository,
                                PedidoItemsRepository $pedidosItemsRepository,
                                CupomRepository $cupomRepository,
                                ProductRepository $productRepository )
    {


        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
        $this->pedidoItemsRepository = $pedidosItemsRepository;

    }
    public function update(array $data, $id)
    {
        $this->clientRespository->update($data,$id);
        $userId = $this->clientRespository->find($id, ['user_id'])->user_id;
        // dd($userId);

        $this->userRepository->update($data['user'],$userId);
    }

    public function create(array $data)
    {

        try{
            \DB::beginTransaction();
            $data['status'] = 1;

            if(isset($data['cupom_code'])){
                $cupom =$this->cupomRepository->findByField('code',$data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
//                dd($data);
                $cupom->used = 1;
                $cupom->save();
                unset($data['cupom_code']);

            }
//
            $items = $data['items'];
            unset($data['items']);

//            if(isset($data['desconto']) && empty($data['desconto']))
//                unset($data['desconto']);



            $order = $this->orderRepository->create($data);
            $item1 =[
//                'produto_id' => 1,
//                'pedido_id' => 1,
                'qtd' => 1,
                'preco' => 11,
            ];


            $total = 0;


            foreach ($items as $item){
                $item['preco']  = $this->productRepository->find($item['produto_id'])->preco;

                $order->items()->create($item);
                $total +=$item['preco'] * $item['qtd'];
//                dd($item);
            }
//            dd($data);
//            $order->total = 10;
            if(isset($cupom)){
                $order->total = $total - $cupom->value;
            }

            $order->total = $total;

            //REALIZAR O DESCONTO CASO EXISTIR
            if(isset($data['desconto'])  && !empty($data['desconto']))
                $order->total = $total - $data['desconto'];

//            dd($order);

            $order->save();

            \DB::commit();
//            dd($order);
            return $order;

        }catch (\Exception $e){
            \DB::rollBack();
            throw  $e;
        }

    }

    public function updateStatus($id, $idDeveliveryman, $status)
    {
        $order = $this->orderRepository->getByAndIdDeliveryman($id,$idDeveliveryman);

        if($order instanceof  Pedido){
            $order->status = $status;
            $order->save();
            return $order;
        }

        return false;
    }
}