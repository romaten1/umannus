<?php

namespace app\modules\files\models;

use Yii;

/**
 * Це клас моделі для таблиці "tbl_file".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property string $title_arkhive
 * @property string $content
 * @property string $path
 * @property integer $subject
 * @property integer $author_id
 * @property integer $status
 * @property integer $size
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['create'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'type', 'content', 'path', 'subject', 'title_arkhive', 'author_id', 'status', 'size', 'url'], 'required'],
            [['description', 'content'], 'string'],
            [['type', 'subject', 'author_id', 'status', 'size', 'created_at', 'updated_at'], 'integer'],
            [['title', 'path', 'url'], 'string', 'max' => 255],
            [['title_arkhive'], 'safe'],
            [['title_arkhive'], 'file','maxFiles' => 10],
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
            'description' => Yii::t('app', 'Опис'),
            'type' => Yii::t('app', 'Тип'),
            'title_arkhive' => Yii::t('app', 'Назва архіву'),
            'content' => Yii::t('app', 'Вміст архіву'),
            'path' => Yii::t('app', 'Шлях до файлу'),
            'subject' => Yii::t('app', 'Предмет'),
            'author_id' => Yii::t('app', 'Автор'),
            'status' => Yii::t('app', 'Статус'),
            'size' => Yii::t('app', 'Розмір'),
            'url' => Yii::t('app', 'Посилання'),
            'created_at' => Yii::t('app', 'Створено'),
            'updated_at' => Yii::t('app', 'Оновлено'),
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->created_at =  time();
            $this->updated_at =  time();
            return true;
        }
        return false;
    }
}
