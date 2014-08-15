<?php

namespace app\modules\job\models;

use Yii;

/**
 * Це клас моделі для таблиці "tbl_job".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property integer $type
 */
class Job extends \yii\db\ActiveRecord
{
    const STATUS_JOB_WORK = 0;
    const STATUS_JOB_ORG = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_en', 'type'], 'required'],
            [['type'], 'integer'],
            [['title', 'title_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Назва'),
            'title_en' => Yii::t('app', 'Назва англійською'),
            'type' => Yii::t('app', 'Тип'),
        ];
    }
}
