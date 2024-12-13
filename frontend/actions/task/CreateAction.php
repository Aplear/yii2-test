<?php

namespace frontend\actions\task;

use frontend\models\Task;
use yii\base\Action;
use yii\db\Exception;

class CreateAction extends Action
{

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws Exception
     */
    public function run()
    {
        $model = new Task();

        if (\Yii::$app->controller->request->isPost) {
            if ($model->load(\Yii::$app->controller->request->post()) && $model->save()) {
                return \Yii::$app->controller->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return \Yii::$app->controller->render('create', [
            'model' => $model,
        ]);
    }
}