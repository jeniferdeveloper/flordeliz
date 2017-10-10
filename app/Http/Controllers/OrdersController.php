<?php

namespace FlorDeLiz\Http\Controllers;

use FlorDeLiz\Models\Pedido;
use FlorDeLiz\Repositories\Criteria\MyCriteria;
use FlorDeLiz\Repositories\PedidoRepository;
use Illuminate\Http\Request;
use FlorDeLiz\Repositories\UserRepository;
use FlorDeLiz\Repositories\RoleRepository;
use FlorDeLiz\Models\User;

class OrdersController extends Controller
{
    private $pedidoRepository;
    /**
     * @var PedidoItemsRepository
     */
    private $pedidoItemsRepository;

    // private $user;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
        // $this->user = $userRepository;
    }

    public function index()
    {
        $orders = $this->pedidoRepository->paginate(10);

        return view('admin.orders.index', compact('orders'));

    }

    public function delivery()
    {
        $orders = $this->pedidoRepository->findByField('status', 'Nota fiscal emitida');
//dd($orders);

        return view('admin.orders.delivery', compact('orders'));

    }


    public function edit($id, UserRepository $userRepository)
    {
//        $userRepository->pushCriteria(new MyCriteria());
        $order = $this->pedidoRepository->find($id);
        $deliverymans = User::with(['roles' => function ($q) {
            $q->where('role_id', 2);
        }])->whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->lists('name', 'id');
//       $deliverymans =  $userRepository->with(['roles'])->lists(); // ??? }])->paginate();
        $statusOrder = Pedido::getEnumValues('Orders', 'status');
//        dd($statusOrder);
        return view('   admin.orders.edit', compact('order', 'deliverymans', 'statusOrder'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
//        dd($data,$id);
        $this->pedidoRepository->update($data, $id);
        return redirect()->route('admin.orders.index');
    }

    public function delete($id)
    {
        $pedidoId = $id;
        return view('admin.orders.delete', compact('pedidoId'));

    }

    public function destroy($id)
    {

//        $data = $request->all();
//        dd($id);
        $this->pedidoRepository->delete($id);

        return redirect()->route('admin.orders.index');
    }


}