<?php


namespace App\Http\Interfaces\Repositories;


use Illuminate\Auth\AuthenticationException;

interface UserRepositoryInterface
{
    /**
     * @param array $data
     * @return object
     */
    public function store(array $data): object;

    /**
     * @param string $email
     * @param string $password
     * @return string
     * @throws AuthenticationException
     */
    public function login(string $email, string $password): string;
}
