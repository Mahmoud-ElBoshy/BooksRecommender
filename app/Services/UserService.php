<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($data)
    {
        $user = $this->userRepository->create($data);

        return $user;
    }

    public function getProfile(int $userId): User
    {
        $user = $this->userRepository->getOne($userId);


        if (! $user) {
            abort(404, 'User not found');
        }

        return $user;
    }
}
