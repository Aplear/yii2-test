<?php

namespace frontend\modules\api\controllers;


use frontend\modules\api\models\LoginForm;
use yii\db\Exception;
use yii\rest\ActiveController;

class AuthController extends ActiveController
{
    public $modelClass = LoginForm::class;

    /**
     * @return array
     */
    protected function verbs()
    {
        return [
            'auth' => ['post'],
        ];
    }


    /**
     * @return array
     * @throws Exception
     */
    public function actionAuth()
    {
        $model = new LoginForm();
        $model->load(\Yii::$app->request->bodyParams, '');

        if ($token = $model->auth()) {
            return [
                'bearer_token' => $token
            ];
        } else {
            return [
                'error' => true,
                'message' => 'Incorrect username or password.'
            ];
        }
    }
}
