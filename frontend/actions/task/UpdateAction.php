<?php

namespace frontend\actions\task;

use yii\base\Action;
use yii\web\NotFoundHttpException;

class UpdateAction extends Action
{

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function run($id)
    {
        $model = \Yii::$app->controller->findModel($id);

        if (\Yii::$app->controller->request->isPost && $model->load(
                \Yii::$app->controller->request->post()
            ) && $model->save()) {
            return \Yii::$app->controller->redirect(['view', 'id' => $model->id]);
        }

        return \Yii::$app->controller->render('update', [
            'model' => $model,
        ]);
    }
}