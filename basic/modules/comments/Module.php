<?php

namespace app\modules\comments;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\comments\controllers';

    public $maxLevel = 3;

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
