<?php

namespace frontend\modules\api\controllers;


use frontend\models\Task;

/**
 * Default controller for the `api` module
 */
class TaskController extends BaseController
{
    public $modelClass = Task::class;

}
