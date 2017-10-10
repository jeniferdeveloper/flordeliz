<?php

namespace FlorDeLiz\Services;

use FlorDeLiz\Repositories\UserRepository;
use FlorDeLiz\Repositories\ClientRepository;

class ClientService
{

    /**
     * @var ClientRepository
     */
    private $clientRespository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRespository, UserRepository $userRepository)
    {

        $this->clientRespository = $clientRespository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data, $id)
    {

//        dd($data);
        $this->clientRespository->update($data, $data['id']);

        $userId = $this->clientRespository->find($data['id'], ['user_id'])->user_id;

        $this->userRepository->update($data['user'], $userId);
    }

    public function store(array $data)
    {
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);
        // dd($userId);
        // exit;        
        $data['user_id'] = $user->id;
        // dd($data);
        $this->clientRespository->create($data);
        // dd($userId);

    }
}