<?php

namespace app\modules\cafedra\models;

use app\helpers\TransliterateHelper;
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
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
            [['faculty_id', 'title', 'description', 'image_id', 'active'], 'required'],
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
            'id' => Yii::t('app', 'ID кафедри'),
            'faculty_id' => Yii::t('app', 'Факультет'),
            'title' => Yii::t('app', 'Назва'),
            'title_en' => Yii::t('app', 'Назва англійською'),
            'description' => Yii::t('app', 'Коротка інформація'),
            'image_id' => Yii::t('app', 'ID малюнку'),
            'active' => Yii::t('app', 'Активна'),
            'visited' => Yii::t('app', 'Відвідувань'),
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->title_en =  TransliterateHelper::cyrillicToLatin($this->title);
            return true;
        }
        return false;
    }
}
