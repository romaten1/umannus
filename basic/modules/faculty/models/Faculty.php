<?php

namespace app\modules\faculty\models;

use Yii;

/**
 * Це клас моделі для таблиці "tbl_faculty".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property integer $visited
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faculty}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_en', 'description'], 'required'],
            [['description'], 'string'],
            [['visited'], 'integer'],
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
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'description' => Yii::t('app', 'Description'),
            'visited' => Yii::t('app', 'Visited'),
        ];
    }
}
