<?php

namespace app\components\mygii;


use Yii;
use yii\base\BootstrapInterface;
use yii\web\ForbiddenHttpException;
use yii\gii;

class Mygii extends \yii\gii\Module 
{
	/**
	 * Переопределение метода корневых генераторов - указываем новые адреса генераторов
	 */

	protected function coreGenerators()
    {
        parent::coreGenerators();
    }
}