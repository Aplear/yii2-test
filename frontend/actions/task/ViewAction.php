<?php

namespace frontend\actions\task;

use yii\base\Action;
use yii\web\NotFoundHttpException;

class ViewAction extends Action
{
    /**
     * Displays a single Task model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function run($id)
    {
        return \Yii::$app->controller->render('view', [
            'model' => \Yii::$app->controller->findModel($id),
        ]);
    }
}