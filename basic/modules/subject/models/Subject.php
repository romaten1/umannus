<?php

namespace app\modules\subject\models;

use Yii;
use app\helpers\TransliterateHelper;
/**
 * Це клас моделі для таблиці "tbl_subject".
 *
 * @property integer $id
 * @property integer $cafedra_id
 * @property string $title
 * @property string $title_en
 * @property integer $active
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cafedra_id', 'title', 'active'], 'required'],
            [['cafedra_id', 'active'], 'integer'],
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
            'cafedra_id' => Yii::t('app', 'Кафедра'),
            'title' => Yii::t('app', 'Назва'),
            'title_en' => Yii::t('app', 'Назва англійською'),
            'active' => Yii::t('app', 'Активний'),
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
