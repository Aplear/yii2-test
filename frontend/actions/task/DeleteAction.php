<?php

namespace frontend\actions\task;

use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteAction extends Action
{

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function run($id)
    {
        \Yii::$app->controller->findModel($id)->delete();

        return \Yii::$app->controller->redirect(['index']);
    }
}