<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return object
     */
    public function store(array $data): object
    {
        return $this->model::create($data);
    }


    /**
     * @param string $email
     * @param string $password
     * @return string
     * @throws AuthenticationException
     */
    public function login(string $email, string $password): string
    {
        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password
            ]
        )) {
            //its correct and we can set api token
            $token = Str::random(60);
            //its correct data
            Auth::user()->forceFill(
                [
                    'api_token' => hash('sha256', $token),
                ]
            )->save();

            return $token;
        }
        //throw error
       throw new AuthenticationException;
    }
}
