<?php
namespace FlorDeLiz\Http\Controllers;

use FlorDeLiz\Repositories\Criteria\MyCriteria;
use FlorDeLiz\Repositories\CupomRepository;
use Illuminate\Http\Request;
use FlorDeLiz\Models\User;
use FlorDeLiz\Http\Requests\AdminCupomRequest;
use Faker\Factory;

class CupomsController extends Controller
{
    private $repository;
    // private $user;

    public function __construct(CupomRepository $cupomRepository)
    {
        $this->repository = $cupomRepository;
        // $this->user = $userRepository;

    }

    public function index()
    {
        $cupoms = $this->repository->paginate(5);


        return view('admin.cupoms.index', compact('cupoms'));

    }

    public function create(Request $request)
    {
          $data = $request->all();
        if ($request->ajax()) {
        $faker = Factory::create();
            $result =[
                'code'=> strtoupper(substr($faker->md5,0,6))
            ];
           
            return response()->json(compact('result'));
        }
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {


        $data = $request->all();
        // dd($data);
        $this->repository->create($data);
        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id, UserRepository $userRepository)
    {
//        $userRepository->pushCriteria(new MyCriteria());
        $cupom = $this->repository->find($id);
        $deliverymans = User::with(['roles' => function ($q) {
            $q->where('role_id', 2);
        }])->whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->lists('name', 'id');
//       $deliverymans =  $userRepository->with(['roles'])->lists(); // ??? }])->paginate();
        $statusOrder = Order::getEnumValues('Orders', 'status');
//        dd($statusOrder);
        return view('   admin.cupoms.edit', compact('cupom', 'deliverymans', 'statusOrder'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();
//        dd($data,$id);
        $this->repository->update($data, $id);
        return redirect()->route('admin.cupoms.index');
    }
}