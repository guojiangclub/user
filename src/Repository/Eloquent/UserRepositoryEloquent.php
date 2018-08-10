<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/28
 * Time: 22:51
 */

namespace iBrand\Component\User\Repository\Eloquent;

use iBrand\Component\User\Repository\UserRepository;
use Illuminate\Support\Str;
use Prettus\Repository\Eloquent\BaseRepository;
use iBrand\Component\User\Models\User;
use Prettus\Repository\Traits\CacheableRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Get a user by the given credentials.
     * @param array $credentials
     * @return mixed
     */
    public function getUserByCredentials(array $credentials)
    {
        $query = $this->model;
        foreach ($credentials as $key => $value) {
            if (!Str::contains($key, 'password') AND !empty($value)) {
                $query = $query->where($key, $value);
            }
        }

        return $query->first();
    }
}