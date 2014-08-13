<?php

namespace app\modules\cafedra;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\cafedra\controllers';

    public $defaultController = 'app\modules\cafedra\controllers\cafedra';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
