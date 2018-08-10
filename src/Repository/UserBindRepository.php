<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/28
 * Time: 22:53
 */

namespace iBrand\Component\User\Repository\Eloquent;

use Prettus\Repository\Contracts\RepositoryInterface;

interface UserBindRepository extends RepositoryInterface
{
    /**
     * get user bind model by openid.
     * @param $openid
     * @return mixed
     */
    public function getByOpenId($openid);

    /**
     * get user bind model by user'id and app'id
     * @param $userId
     * @param $appId
     * @return mixed
     */
    public function getByUserIdAndAppId($userId, $appId);

    /**
     * bind model to user.
     * @param $openId
     * @param $userId
     * @return mixed
     */
    public function bindToUser($openId, $userId);
}