<?php

namespace app\modules\files\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\files\models\Files;

/**
 * FilesSearch represents the model behind the search form about `app\modules\files\models\Files`.
 */
class FilesSearch extends Files
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'subject', 'author_id', 'status', 'size', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'title_arkhive', 'content', 'path', 'url'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Files::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'subject' => $this->subject,
            'author_id' => $this->author_id,
            'status' => $this->status,
            'size' => $this->size,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'title_arkhive', $this->title_arkhive])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
