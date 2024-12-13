<?php

namespace frontend\modules\api\models;

use common\models\User;
use yii\base\Model;
use yii\db\Exception;

/**
 * Login Class Model
 */
class LoginForm extends Model
{
    /**
     * @var $username
     */
    public $username;

    /**
     * @var $password
     */
    public $password;

    /**
     * @var $_user
     */
    private $_user;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * @return mixed|null
     * @throws Exception
     */
    public function auth()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if (is_null($user->access_token)) {
                $user->generateAccessToken();
                $user->save();
            }
            return $user->access_token;
        } else {
            return null;
        }
    }

    /**
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}