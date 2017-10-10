<?php

namespace FlorDeLiz\Http\Controllers;


use FlorDeLiz\Repositories\ProducaoRepository;
use FlorDeLiz\Repositories\ProductRepository;
use Illuminate\Http\Request;


class ProductionsController extends Controller
{
    private $repository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var ProducaoRepository
     */


    // private $user;

    public function __construct(ProducaoRepository $producoesRepository, ProductRepository $productRepository)
    {


//        $this->repository = $productionRepository;
        // $this->user = $userRepository;

        $this->repository = $producoesRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {

        $productions = $this->repository->paginate(5);


        return view('admin.productions.index', compact('productions'));

    }

    public function create()
    {

        $products = $this->productRepository->listsProduct();

        return view('admin.productions.create', compact('products'));

    }

    public function store(Request $request)
    {

        $data = $request->all();

        $data['tamanho'] = $this->productRepository->find($data['produto_id'])->tamanho;

//        dd($data);
        $this->repository->create($data);

        return redirect()->route('admin.productions.index');

    }
    public function edit($id)
    {

        $producao = $this->repository->find($id);

        $products = $this->productRepository->listsProduct();

        return view('admin.productions.edit', compact('producao', 'products'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
//        dd($data,$id);
        $this->repository->update($data, $id);
        return redirect()->route('admin.productions.index');
    }
    public function obterProdutoTamanho($id)
    {
        $response = null;
        if (!empty($id)) {
            $produto = $this->productRepository->find($id);

            $response = [
                'data' => [
                    'tamanho' => $produto->tamanho
                ]
            ];
        }

        return \Response::json($response);

    }


}