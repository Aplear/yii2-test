<?php

namespace frontend\actions\task;

use frontend\models\TaskSearch;
use yii\base\Action;

class IndexAction extends Action
{
    public function run()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(\Yii::$app->controller->request->queryParams);

        return \Yii::$app->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}