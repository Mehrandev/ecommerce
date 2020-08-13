<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Http\Requests\Api\UserLoginRequest;
use App\Http\Requests\Api\UserRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Resources\User\User as UserResource;

class AuthController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserRegisterRequest $request
     * @return UserResource
     */
    public function store(UserRegisterRequest $request)
    {
        return new UserResource($this->userRepository->store($request->validated()));
    }

    /**
     * @param UserLoginRequest $request
     * @return string
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login(UserLoginRequest $request)
    {
        return $this->userRepository->login($request->email, $request->password);
    }
}
