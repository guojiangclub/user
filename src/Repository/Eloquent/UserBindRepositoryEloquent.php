<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/28
 * Time: 22:55
 */

namespace iBrand\Component\User\Repository\Eloquent;

use iBrand\Component\User\Models\UserBind;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class UserBindRepositoryEloquent extends BaseRepository implements UserBindRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserBind::class;
    }

    /**
     * get user bind model by openid.
     * @param $openid
     * @return mixed
     */
    public function getByOpenId($openid)
    {
        return $this->findByField('openid', $openid);
    }

    /**
     * get user bind model by user'id and app'id
     * @param $userId
     * @param $appId
     * @return mixed
     */
    public function getByUserIdAndAppId($userId, $appId)
    {
        return $this->findWhere(['user_id' => $userId, 'app_id' => $appId]);
    }


    /**
     * @param $openId
     * @param $userId
     * @return mixed|void
     * @throws \Exception
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function bindToUser($openId, $userId)
    {
        $userBind = $this->getByOpenId($openId);
        if (!$userBind) {
            throw new \Exception('This user bind model does not exist.');
        }
        $this->update(['user_id' => $userId], $userBind->id);
    }
}