<?php

namespace app\models;

use Yii;

/**
 * Це клас моделі для таблиці "tbl_cafedra".
 *
 * @property integer $id
 * @property integer $faculty_id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property integer $image_id
 * @property integer $active
 * @property integer $visited
 */
class Cafedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cafedra}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_id', 'title', 'title_en', 'description', 'image_id', 'active'], 'required'],
            [['faculty_id', 'image_id', 'active', 'visited'], 'integer'],
            [['description'], 'string'],
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
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'description' => Yii::t('app', 'Description'),
            'image_id' => Yii::t('app', 'Image ID'),
            'active' => Yii::t('app', 'Active'),
            'visited' => Yii::t('app', 'Visited'),
        ];
    }
}
